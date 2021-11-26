<?php

namespace Fk\Sauce\Macro\Blueprint;

use Fk\Sauce\Macro\Contracts\Blueprint;
use Closure;

class FlagBlueprint implements Blueprint
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        $props = static::$props;
        return (
            function ($nullable = false) use ($props) {
                return $this->boolean($props['fieldName'])->nullable($nullable);
            }
        );
    }
}
