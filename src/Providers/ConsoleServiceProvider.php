<?php

namespace Fk\Sauce\Providers;

use Illuminate\Support\ServiceProvider;
use Fk\Sauce\Foundation\Console\Kernel;

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

    /**
     * @return array
     */
    private function getConsoleKernels()
    {
        $kernels = config('flekking.sauce.console.kernels');
        if (is_string($kernels)) $kernels = [$kernels];
        $kernels[] = Kernel::class;

        foreach ($kernels as $kernel) {
            if ( ! (new $kernel) instanceof ConsoleKernel) {
                throw ConsoleException::new()
                    ->problem('console_kernel_does_not_extend_abstraction', [
                        'kernel' => $kernel,
                    ])
                    ->toss();
            }
        }

        return $kernels;
    }
}
