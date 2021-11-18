<?php

namespace Fk\Sauce\Foundation\Observers;

use Fk\Sauce\Observer\Kernel as ObserverKernel;

class Kernel extends ObserverKernel
{
    /**
     * @static
     * @return array
     */
    public static function observers() : array
    {
        return [];
    }
}
