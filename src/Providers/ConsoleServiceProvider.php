<?php

namespace Fk\Sauce\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootCommands();
    }

    /**
     * Boot the commands.
     * 
     * @return void
     */
    private function bootCommands()
    {
        if ($this->app->runningInConsole()) {
            $kernels = $this->getConsoleKernels();

            foreach ($kernels as $kernel) $this->commands($kernel::commands());
        }
    }
}
