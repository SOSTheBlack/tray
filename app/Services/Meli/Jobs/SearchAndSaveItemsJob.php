<?php

namespace App\Services\Meli\Jobs;

use Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\DataCollection;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\Datas\MeliItemData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\Meli\Contracts\MeliService;
use App\Repositories\Datas\Enums\StatusMeliItem;
use App\Repositories\Contracts\MeliItemRepository;
use App\Services\Meli\Data\Sites\SearchResultData;
use App\Services\Meli\Exceptions\Jobs\TableLimitException;
use App\Services\Meli\Exceptions\Resources\SitesException;
use SOSTheBlack\Repository\Exceptions\RepositoryException;
use Illuminate\Contracts\Container\BindingResolutionException;

class SearchAndSaveItemsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    // public $queue = 'meli_get_items';

    private const SEARCHING_WORD = 'Boxbraids';

    /**
     * @var MeliItemRepository
     */
    private MeliItemRepository $meliItemRepository;

    /**
     * @var MeliService
     */
    private MeliService $meliService;

    public function __construct()
    {
        $this->onQueue('meli_get_items');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->boot();

        try {
            $this->tableLimitExceeded();

            $itemsMeli = $this->findItemsInMeli();

            $itemsMeli->each(function (SearchResultData $item) {
                $meliItemData = MeliItemData::from(
                    $this->meliItemRepository->updateOrCreate(
                        ['item_id' => $item->id], ['title' => $item->title, 'status' => StatusMeliItem::in_process]
                    )
                );

                $this->sendToQueueForVisits($meliItemData);
            });
        } catch (TableLimitException) {
            $meliItemsDatabase = MeliItemData::collection($this->meliItemRepository->all()['data']);

            $meliItemsDatabase->each(function (MeliItemData $meliItemData) {
                $this->meliItemRepository->update(['status' => StatusMeliItem::in_process], $meliItemData->id);

                $this->sendToQueueForVisits($meliItemData);
            });

            $meliItemsDatabase->each(fn(MeliItemData $meliItemData) => $this->sendToQueueForVisits($meliItemData));
        } catch (Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
        }
    }

    /**
     * @return void
     */
    private function boot(): void
    {
        $this->meliService = app(MeliService::class);
        $this->meliItemRepository = app(MeliItemRepository::class);
    }

    /**
     * @return void
     *
     * @throws TableLimitException
     * @throws BindingResolutionException
     * @throws RepositoryException
     */
    private function tableLimitExceeded(): void
    {
        if ($this->meliItemRepository->count() >= $this->meliItemRepository::TABLE_LIMIT) {
            throw new TableLimitException(vsprintf('record limit exceeded, max (%u)', [$this->meliItemRepository::TABLE_LIMIT]));
        }
    }

    /**
     * @return DataCollection
     *
     * @throws SitesException
     */
    private function findItemsInMeli(): DataCollection
    {
        return $this->meliService->sites()->setLimit($this->meliItemRepository::TABLE_LIMIT)->search(self::SEARCHING_WORD);
    }

    private function sendToQueueForVisits(MeliItemData $meliItemData): void
    {
        dispatch(new GetAndSaveVisitsJob($meliItemData))->onQueue('meli_get_visits');
    }
}
