<?php

namespace App\Services\Meli\Jobs;

use Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Spatie\LaravelData\DataCollection;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\Datas\MeliItemData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\Meli\Contracts\MeliService;
use App\Repositories\Datas\Enums\StatusMeliItem;
use App\Repositories\Contracts\MeliItemRepository;
use App\Services\Meli\Exceptions\Resources\SitesException;

class GetAndSaveVisitsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var MeliItemData
     */
    private MeliItemData $meliItemData;

    /**
     * @var MeliService
     */
    private mixed $meliService;

    /**
     * @var MeliItemRepository
     */
    private mixed $meliItemRepository;

    /**
     * Create a new job instance.
     */
    public function __construct(MeliItemData $meliItemData)
    {
        $this->meliItemData = $meliItemData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->boot();

        try {
            $this->saveNewNumberVisits($this->getVisits());
        } catch (Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
        }
    }

    /**
     * Initialize.
     *
     * @return void
     */
    private function boot(): void
    {
        $this->meliService = app(MeliService::class);
        $this->meliItemRepository = app(MeliItemRepository::class);
    }

    private function saveNewNumberVisits(object $visit): void
    {
        $this->meliItemRepository->update(
                [
                    'visits' => $visit->{$this->meliItemData->item_id},
                    'status' => StatusMeliItem::processed
                ],
                id: $this->meliItemData->id
            );
    }

    /**
     * @throws SitesException
     */
    private function getVisits(): object
    {
        return $this->meliService->visits()->items(['ids' => $this->meliItemData->item_id]);
    }
}
