<?php

namespace Fk\Sauce\Database\Builder\Extent\Modes;

trait BooleanMode
{
    /**
     * @return void
     */
    protected function booleanMode()
    {
        $queueIndex = $this->queueIndex;
        $queueColumn = $this->queueColumn;
        $request = $this->request;

        if ($request->query($queueIndex, '*') !== '*') {
            $this->add(
                $request->boolean($queueIndex)
                    ?   'is'.Str::studly($queueColumn)
                    :   'isNot'.Str::studly($queueColumn)
            );
        }
    }
}
