<?php

namespace Fk\Sauce\Task;

use Fk\Sauce\Database\Traits\{
    BuildWhere,
    Transaction,
};

abstract class Task
{
    use BuildWhere, Transaction;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function handle($request);
}
