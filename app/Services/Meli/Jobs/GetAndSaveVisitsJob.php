<?php

namespace App\Services\Meli\Jobs;

use Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Application;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\Datas\MeliItemData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\Meli\Contracts\MeliService;
use App\Repositories\Datas\Enums\StatusMeliItem;
use App\Repositories\Contracts\MeliItemRepository;

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
            $response = $this->meliService
                ->visits()
                ->items(['ids' => $this->meliItemData->item_id]);

            dump($response);
            $response = $this->meliItemRepository
                ->update(
                    [
                        'visits' => $response->{$this->meliItemData->item_id},
                        'status' => StatusMeliItem::processed
                    ],
                    $this->meliItemData->id
                );

            // dd($response);
        } catch (Throwable $exception) {
            dd($exception);
        }

        dump('run '.$this->meliItemData->title);
    }

    private function boot(): void
    {
        $this->meliService = app(MeliService::class);
        $this->meliItemRepository = app(MeliItemRepository::class);
    }
}
