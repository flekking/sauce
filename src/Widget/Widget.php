<?php

namespace Fk\Sauce\Widget;

use Fk\Sauce\Database\Traits\{
    BuildExtent,
    BuildWhere,
    Transaction,
};

abstract class Widget
{
    use BuildExtent, BuildWhere, Transaction;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function touch($request);
}
