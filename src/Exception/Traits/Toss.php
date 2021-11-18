<?php

namespace Fk\Sauce\Exception\Traits;

use Exception;

trait Toss
{
    /**
     * Help the chaining method to return \Exception instance by default.
     * 
     * @return \Exception
     */
    public function toss() : Exception
    {
        return $this;
    }
}
