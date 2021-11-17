<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Str;

trait StrictStringMode
{
    /**
     * @return void
     */
    public function strictStringMode()
    {
        $queueIndex = $this->queueIndex;

        if ($this->valueNotAll($queueIndex))
            $this->addWhere([
                $this->queueColumn, '=', $this->value($queueIndex, '*')
            ]);
    }
}
