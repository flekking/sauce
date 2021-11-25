<?php

namespace Fk\Sauce\Exception\Traits;

use Exception;

trait Generate
{
    /**
     * @static
     * @return  \Exception
     */
    public static function new() : Exception
    {
        return new static;
    }
}
