<?php

namespace Fk\Sauce\Console;

use Fk\Sauce\Exception\SauceException;

class ConsoleException extends SauceException
{
    /**
     * @var array
     */
    protected $messages = [
        'console_kernel_does_not_extend_abstraction' =>
            'Console Kernel \':kernel\' must extends '.Kernel::class,
    ];
}
