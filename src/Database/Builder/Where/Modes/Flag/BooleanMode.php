<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Flag;

trait BooleanMode
{
    /**
     * @return void
     */
    public function booleanMode()
    {
        $queueIndex = $this->queueIndex;

        if ($this->valueNotAll($queueIndex))
            $this->addWhere([
                $this->queueColumn, $this->request->boolean($queueIndex)
            ]);
    }
}
