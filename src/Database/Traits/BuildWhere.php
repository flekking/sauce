<?php

namespace Fk\Sauce\Database\Traits;

use Fk\Sauce\Database\Builder\Where\WhereBuilder;

trait BuildWhere
{
    /**
     * Return new instance of \Fk\Sauce\Database\Builder\Where\WhereBuilder
     * without use keyword.
     * 
     * @return \Fk\Sauce\Database\Builder\Where\WhereBuilder
     */
    protected function buildWhere()
    {
        return new WhereBuilder();
    }
}
