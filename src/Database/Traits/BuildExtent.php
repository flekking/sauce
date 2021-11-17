<?php

namespace Fk\Sauce\Database\Traits;

use Fk\Sauce\Database\Builder\Extent\ExtentBuilder;

trait BuildExtent
{
    /**
     * Return new instance of \Fk\Sauce\Database\Builder\Extent\ExtentBuilder
     * without use keyword.
     * 
     * @return \Fk\Sauce\Database\Builder\Extent\ExtentBuilder
     */
    protected function buildExtent()
    {
        return new ExtentBuilder();
    }
}
