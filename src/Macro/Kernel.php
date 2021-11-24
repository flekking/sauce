<?php

namespace Fk\Sauce\Macro;

abstract class Kernel
{
    /**
     * @static
     * @return array
     */
    abstract public static function blueprints() : array;

    /**
     * @static
     * @return array
     */
    abstract public static function rules() : array;
}
