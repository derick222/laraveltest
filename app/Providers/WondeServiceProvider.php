<?php

namespace App\Providers;

use App\Service\WondeService;
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
        $this->app->bind(WondeService::class, function () {
            return new WondeService();
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
