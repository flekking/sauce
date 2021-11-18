<?php

namespace Fk\Sauce\Observer;

abstract class Kernel
{
    /**
     * @static
     * @return array
     */
    abstract public static function observers() : array;
}
