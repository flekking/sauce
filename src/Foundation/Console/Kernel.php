<?php

namespace Fk\Sauce\Foundation\Console;

use Fk\Sauce\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * @static
     * @return array
     */
    public function commands() : array
    {
        return [
            // Macro
            \Fk\Sauce\Foundation\Commands\Macro\KernelMakeCommand::class,
        ];
    }
}
