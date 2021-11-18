<?php

namespace Fk\Sauce\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Fk\Sauce\Database\Eloquent\Kernel as EloquentKernel;
use Fk\Sauce\Database\Eloquent\EloquentException;
use Fk\Sauce\Foundation\Models\Kernel;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMorphAliasses();
    }

    /**
     * @return void
     */
    private function registerMorphAliasses()
    {
        $kernels = $this->getEloquentKernels();
        foreach ($kernels as $kernel) {
            $morphAliasses = $kernel::relationMorphAliasses();
            Relation::morphMap($morphAliasses);
        }
    }

    /**
     * @return array
     */
    private function getEloquentKernels()
    {
        $kernels = config('sauce.eloquent.kernels');
        if (is_string($kernels)) $kernels = [$kernels];
        $kernels[] = Kernel::class;

        foreach ($kernels as $kernel) {
            if ( ! (new $kernel) instanceof EloquentKernel) {
                throw EloquentException::new()
                    ->problem('eloquent_kernel_does_not_extend_abstraction', [
                        'kernel' => $kernel,
                    ])
                    ->toss();
            }
        }

        return $kernels;
    }
}
