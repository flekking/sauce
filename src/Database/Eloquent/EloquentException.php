<?php

namespace Fk\Sauce\Database\Eloquent;

use Fk\Sauce\Exception\SauceException;

class EloquentException extends SauceException
{
    /**
     * @var array
     */
    protected array $messages = [
        'eloquent_kernel_does_not_extend_abstraction' =>
            'Eloquent Kernel \':kernel\' must extends '.Kernel::class,
    ];
}
