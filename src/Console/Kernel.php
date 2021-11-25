<?php

namespace Fk\Sauce\Console;

abstract class Kernel
{
    /**
     * @static
     * @return array
     */
    abstract public static function commands() : array;
}
