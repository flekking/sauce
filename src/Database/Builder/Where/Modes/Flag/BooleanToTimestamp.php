<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Flag;

trait BooleanToTimestampMode
{
    /**
     * @return void
     */
    public function booleanToTimestampMode()
    {
        $queueIndex = $this->queueIndex;
        $queueColumn = $this->queueColumn;
        
        if ($this->valueNotAll($queueIndex))
            $this->addWhere([
                $this->request->boolean($queueIndex)
                    ?   (fn ($query) => $query->whereNotNull($queueColumn))
                    :   (fn ($query) => $query->whereNull($queueColumn))
            ]);
    }
}
