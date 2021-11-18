<?php

namespace Fk\Sauce\Exceptions\Traits;

use Exception;

trait Generate
{
    /**
     * @static
     * @return  \Exception
     */
    public static function new() : Exception
    {
        return new self;
    }
}
