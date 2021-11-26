<?php

namespace Fk\Sauce\Foundation\Macro;

use Fk\Sauce\Macro\Kernel as MacroKernel;

class Kernel extends MacroKernel
{
    /**
     * @return array
     */
    public static function blueprints() : array
    {
        return [
            // Str
                // Std
                'extraLongString' => Blueprint\Str\Std\ExtraLongStringBlueprint::class,
                'extraShortString' => Blueprint\Str\Std\ExtraShortStringBlueprint::class,
                'longString' => Blueprint\Str\Std\LongStringBlueprint::class,
                'massiveString' => Blueprint\Str\Std\MassiveStringBlueprint::class,
                'mediumString' => Blueprint\Str\Std\MediumStringBlueprint::class,
                'shortString' => Blueprint\Str\Std\ShortStringBlueprint::class,

            // Decimal
                // Std
                'extraLargeDecimal' => Blueprint\Decimal\Std\ExtraLargeDecimalBlueprint::class,
                'extraSmallDecimal' => Blueprint\Decimal\Std\ExtraSmallDecimalBlueprint::class,
                'largeDecimal' => Blueprint\Decimal\Std\LargeDecimalBlueprint::class,
                'massiveDecimal' => Blueprint\Decimal\Std\MassiveDecimalBlueprint::class,
                'mediumDecimal' => Blueprint\Decimal\Std\MediumDecimalBlueprint::class,
                'smallDecimal' => Blueprint\Decimal\Std\SmallDecimalBlueprint::class,
        ];
    }

    /**
     * @return array
     */
    public static function rules() : array
    {
        return [];
    }
}
