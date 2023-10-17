<?php

namespace App\Providers;

use App\Services\Meli\Meli;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use App\Services\Meli\Contracts\MeliServices;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(MeliServices::class, Meli::class);

        // dd(config('services.meli.base_url'));
        $this->app->singleton(MeliServices::class, function (Application $app) {
            $client = Http::withOptions([
                'base_uri'        => config('services.meli.base_url'),
                'timeout'         => config('services.meli.timeout', 10),
                'connect_timeout' => config('services.meli.connect_timeout', 2),
            ])->baseUrl(config('services.meli.base_url'));

            return new Meli($client);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
