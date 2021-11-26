<?php

namespace Fk\Sauce\Foundation\Macro\Blueprint\Str\Std;

use Fk\Sauce\Macro\Contracts\Blueprint;
use Closure;

class ExtraLongStringBlueprint implements Blueprint
{
    /**
     * @return \Closure
     */
    public static function register()
    {
        return (
            function (string $fieldName, bool $nullable = false) {
                return $this->string($fieldName, 1000)->nullable($nullable);
            }
        );
    }
}
