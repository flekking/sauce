<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Id;

trait IdMode
{
    /**
     * @return void
     */
    public function idMode()
    {
        $queueIndex = $this->queueIndex;

        if ($this->valueNotAll($queueIndex))
            $this->addWhere([
                $this->queueColumn, $this->value($queueIndex, '*')
            ]);
    }
}
