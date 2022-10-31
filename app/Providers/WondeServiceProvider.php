<?php

namespace App\Providers;

use App\Services\WondeService as ServicesWondeService;
use Illuminate\Support\ServiceProvider;

class WondeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServicesWondeService::class, function () {
            return new ServicesWondeService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
