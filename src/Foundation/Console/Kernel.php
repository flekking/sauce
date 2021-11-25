<?php

namespace Fk\Sauce\Foundation\Console;

use Fk\Sauce\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * @static
     * @return array
     */
    public static function commands() : array
    {
        return [
            // Macro
            \Fk\Sauce\Foundation\Console\Commands\Macro\KernelMakeCommand::class,
            \Fk\Sauce\Foundation\Console\Commands\Macro\BlueprintMakeCommand::class,
        ];
    }
}
