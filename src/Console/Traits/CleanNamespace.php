<?php

namespace Fk\Sauce\Console\Traits;

trait CleanNamespace
{
    /**
     * Override the Get Namespace method.
     * 
     * @param  string  $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return trim(implode('\\', explode('\\', $name), '\\'));
    }
}
