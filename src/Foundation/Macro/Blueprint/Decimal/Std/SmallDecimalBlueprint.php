<?php

namespace Fk\Sauce\Foundation\Macro\Blueprint\Decimal\Std;

use Fk\Sauce\Macro\Contracts\Blueprint;
use Closure;

class SmallDecimalBlueprint implements Blueprint
{
    /**
     * @return \Closure
     */
    public static function register()
    {
        return (
            function (string $fieldName, bool $nullable = false) {
                return $this->decimal($fieldName, 29, 20)->nullable($nullable);
            }
        );
    }
}
