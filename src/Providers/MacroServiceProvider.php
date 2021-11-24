<?php

namespace Fk\Sauce\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;
use Fk\Sauce\Macro\Contracts\{
    Blueprint as BlueprintContract,
    Rule as RuleContract,
};
use Fk\Sauce\Macro\MacroException;
use Fk\Sauce\Foundation\Macro\Kernel as MacroKernel;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBlueprintMacros();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootRuleMacros();
    }

    /**
     * @throws \Fk\Sauce\Macro\MacroException
     * @return void
     */
    public function registerBlueprintMacros()
    {
        if ( ! config('flekking.sauce.macro.register.blueprints')) return;

        $kernels = $this->getMacroKernels();
        foreach ($kernels as $kernel) {
            $blueprints = $kernel::$blueprints;

            foreach ($blueprints as $methodName => $blueprintClass) {
                $blueprint = new $blueprintClass;
                if ( ! $blueprint instanceof BlueprintContract) {
                    throw MacroException::new()
                        ->problem('blueprint_has_no_contract', [
                            'methodName' => $methodName,
                            'blueprint' => $blueprintClass,
                        ])
                        ->toss();
                }
                Blueprint::macro(
                    $methodName,
                    call_user_func([
                        $blueprint,
                        BlueprintContract::MAIN_METHOD
                    ])
                );
            }
        }
    }

    /**
     * @return void
     */
    private function bootRuleMacros()
    {
        $kernels = $this->getMacroKernels();
        foreach ($kernels as $kernel) {
            $rules = $kernel::$rules;

            foreach ($rules as $ruleName => $ruleClass) {
                $ruleName = 'fs_'.$ruleName;

                $rule = new $ruleClass;
                if ( ! $rule instanceof RuleContract) {
                    throw MacroException::new()
                        ->problem('rule_has_no_contract', [
                            'ruleName' => $ruleName,
                            'rule' => $ruleClass,
                        ])
                        ->toss();
                }

                $ruleClassMethod = $ruleClass.'@'.RuleContract::VALIDATE_METHOD;
                $replacerClassMethod = $ruleClass.'@'.RuleContract::REPLACE_METHOD;

                Validator::extend($ruleName, $ruleClassMethod);
                Validator::replacer($ruleName, $replacerClassMethod);
            }
        }
    }

    /**
     * @return array
     */
    private function getMacroKernels()
    {
        $kernels = config('flekking.sauce.macro.kernels');
        if (is_string($kernels)) $kernels = [$kernels];
        $kernels[] = Kernel::class;

        foreach ($kernels as $kernel) {
            if ( ! (new $kernel) instanceof MacroKernel) {
                throw MacroException::new()
                    ->problem('macro_kernel_does_not_extend_abstraction', [
                        'kernel' => $kernel,
                    ])
                    ->toss();
            }
        }

        return $kernels;
    }
}
