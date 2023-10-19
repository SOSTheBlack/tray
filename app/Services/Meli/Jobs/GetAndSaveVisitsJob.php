<?php

namespace App\Services\Meli\Jobs;

use Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Application;
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

    private MeliItemData $meliItemData;

    /**
     * @var MeliService|(MeliService&\Illuminate\Contracts\Foundation\Application)|\Illuminate\Contracts\Foundation\Application|Application|mixed
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

    private function boot(): void
    {
        $this->meliService = app(MeliService::class);
        $this->meliItemRepository = app(MeliItemRepository::class);
    }

    /**
     * @throws SitesException
     */
    private function getVisits()
    {
        return $this->meliService->visits()->items(['ids' => $this->meliItemData->item_id]);
    }

    private function saveNewNumberVisits(object $visit): void
    {
        $this->meliItemRepository
            ->update(
                [
                    'visits' => $visit->{$this->meliItemData->item_id},
                    'status' => StatusMeliItem::processed
                ],
                id: $this->meliItemData->id
            );
    }
}
