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
            \Fk\Sauce\Foundation\Console\Commands\Macro\FlagBlueprintMakeCommand::class,
            \Fk\Sauce\Foundation\Console\Commands\Macro\ForeignBlueprintMakeCommand::class,
            \Fk\Sauce\Foundation\Console\Commands\Macro\RuleMakeCommand::class,

            // Task
            \Fk\Sauce\Foundation\Task\TaskAmendMakeCommand::class,
            \Fk\Sauce\Foundation\Task\TaskDestroyMakeCommand::class,
            \Fk\Sauce\Foundation\Task\TaskIndexMakeCommand::class,
            \Fk\Sauce\Foundation\Task\TaskMakeCommand::class,
            \Fk\Sauce\Foundation\Task\TaskManifestMakeCommand::class,
            \Fk\Sauce\Foundation\Task\TaskReviseActivationMakeCommand::class,
            \Fk\Sauce\Foundation\Task\TaskShowMakeCommand::class,
            \Fk\Sauce\Foundation\Task\TaskStoreMakeCommand::class,
        ];
    }
}
