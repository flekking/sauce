<?php

namespace Fk\Sauce\Database\Traits;

use Closure;

trait Transaction
{
    /**
     * @param  \Closure  $closure
     * @return mixed
     */
    protected function transaction(Closure $closure)
    {
        return \DB::transaction($closure);
    }
}
