<?php

namespace Fk\Sauce\Report;

use Fk\Sauce\Database\Traits\{
    BuildExtent,
    BuildWhere,
    Transaction,
};

abstract class Report
{
    use BuildExtent, BuildWhere, Transaction;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function calculate($request);
}
