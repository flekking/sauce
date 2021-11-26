<?php

namespace Fk\Sauce\Foundation\Macro\Blueprint\Str\Std;

use Fk\Sauce\Macro\Contracts\Blueprint;
use Closure;

class ExtraShortStringBlueprint implements Blueprint
{
    /**
     * @return \Closure
     */
    public static function register()
    {
        return (
            function (string $fieldName, bool $nullable = false) {
                return $this->string($fieldName, 50)->nullable($nullable);
            }
        );
    }
}
