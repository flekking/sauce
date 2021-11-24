<?php

namespace Fk\Sauce\Macro;

use Fk\Sauce\Exception\SauceException;
use Fk\Sauce\Macro\Contracts\{
    Blueprint,
    Rule,
};
use Fk\Sauce\Macro\Kernel;

class MacroException extends SauceException
{
    /**
     * @var array
     */
    protected $messages = [
        'blueprint_has_no_contract' =>
            'Blueprint macro \':methodName\' of :model must implements '.Blueprint::class,
        'rule_has_no_contract' =>
            'Rule \':ruleName\' of :rule must implements '.Rule::class,
        'macro_kernel_does_not_extend_abstraction' =>
            'Macro Kernel \':kernel\' must extends '.Kernel::class,
    ];
}
