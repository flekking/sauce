<?php

namespace Fk\Sauce\Providers;

use Illuminate\Support\ServiceProvider;
use Fk\Sauce\Observer\{
    Kernel as ObserverKernel,
    Observer,
    ObserverException,
};
use Fk\Sauce\Foundation\Observers\Kernel;

class ObserverServiceProvider extends ServiceProvider
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
        $this->bootObservers();
    }

    /**
     * @return void
     */
    private function bootObservers()
    {
        $kernels = $this->getObserverKernels();
        foreach ($kernels as $kernel) {
            $observers = $kernel::observers();

            foreach ($observers as $model => $observer) {
                if ( ! (new $observer) instanceof Observer) {
                    throw ObserverException::new()
                        ->problem('observer_does_not_extend_abstraction', [
                            'observer' => $observer
                        ])
                        ->toss();
                }

                $model::observe($observer);
            }
        }
    }

    /**
     * @return array
     */
    private function getObserverKernels()
    {
        $kernels = config('sauce.observer.kernels');
        if (is_string($kernels)) $kernels = [$kernels];
        $kernels[] = Kernel::class;

        foreach ($kernels as $kernel) {
            if ( ! (new $kernel) instanceof ObserverKernel) {
                throw ObserverException::new()
                    ->problem('observer_kernel_does_not_extend_abstraction', [
                        'kernel' => $kernel,
                    ])
                    ->toss();
            }
        }

        return $kernels;
    }
}
