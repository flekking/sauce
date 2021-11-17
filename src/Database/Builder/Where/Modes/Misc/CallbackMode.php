<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Misc;

trait CallbackMode
{
    /**
     * @return void
     */
    public function callbackMode($callback)
    {
        $this->addWhere([$callback($this->request)]);
    }
}
