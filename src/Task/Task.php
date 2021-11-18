<?php

namespace Fk\Sauce\Task;

use Fk\Sauce\Database\Traits\{
    BuildExtent,
    BuildWhere,
    Transaction,
};

abstract class Task
{
    use BuildExtent, BuildWhere, Transaction;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function handle($request);
}
