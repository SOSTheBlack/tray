<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\MeliUserRepository;
use App\Repositories\Contracts\MeliItemRepository;
use App\Repositories\Eloquent\MeliUserRepositoryEloquent;
use App\Repositories\Eloquent\MeliItemRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MeliUserRepository::class, MeliUserRepositoryEloquent::class);
        $this->app->bind(MeliItemRepository::class, MeliItemRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
