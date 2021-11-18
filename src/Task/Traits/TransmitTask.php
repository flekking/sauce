<?php

namespace Fk\Sauce\Task\Traits;

use Fk\Sauce\Task\Task;

trait TransmitTask
{
    /**
     * @param  \Core\Task\Task  $task
     * @param  \Illuminate\Http\Request  $request
     * @param  ...$args
     * @return void
     */
    public function transmit(Task $task, $request, ...$args)
    {
        return $task->handle($request, ...$args);
    }
}
