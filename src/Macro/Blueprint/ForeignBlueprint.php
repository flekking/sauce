<?php

namespace Fk\Sauce\Macro\Blueprint;

use Fk\Sauce\Macro\Contracts\Blueprint;
use Closure;

class ForeignBlueprint implements Blueprint
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        $props = static::$props;
        return (
            function (
                ?string $fieldName = null,
                bool $nullable = false
            ) use ($props) {
                return $this
                    ->foreignId($fieldName ?? $props['defaultFieldName'])
                    ->nullable($nullable)
                    ->constrained($props['table']);
            }
        );
    }
}
