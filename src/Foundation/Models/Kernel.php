<?php

namespace Fk\Sauce\Foundation\Models;

use Fk\Sauce\Database\Eloquent\Kernel as EloquentKernel;

class Kernel extends EloquentKernel
{
    /**
     * @static
     * @return array
     */
    public static function relationMorphAliasses() : array
    {
        return [];
    }
}
