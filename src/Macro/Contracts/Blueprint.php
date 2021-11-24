<?php

namespace Fk\Sauce\Macro\Contracts;

use Closure;

interface Blueprint
{
    /**
     * @var string
     */
    const MAIN_METHOD = 'register';

    /**
     * @return \Closure
     */
    public static function register() : Closure;
}
