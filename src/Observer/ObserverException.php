<?php

namespace Fk\Sauce\Observer;

use Fk\Sauce\Exception\SauceException;

class ObserverException extends SauceException
{
    /**
     * @var array
     */
    protected array $messages = [
        'observer_does_not_extend_abstraction' =>
            'Observer \':observer\' must extends '.Observer::class,
        'observer_kernel_does_not_extend_abstraction' =>
            'Observer Kernel \':kernel\' must extends '.Kernel::class,
    ];
}
