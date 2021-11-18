<?php

namespace Fk\Sauce;

use Illuminate\Support\ServiceProvider;

class SauceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sauce.php', 'flekking.sauce'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/sauce.php' => config_path('flekking/courier.php'),
        ]);
    }
}
