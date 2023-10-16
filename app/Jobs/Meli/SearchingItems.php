<?php

namespace App\Jobs\Meli;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SearchingItems implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        #TODO:
        # Verifica se já tem 10 items cadastrado se não
        # Get https://api.mercadolibre.com/sites/MLB/search?q=iphone%2014&limit=10
        # Save items in database
        # dispach cada item p fila meli_get_visits
    }
}
