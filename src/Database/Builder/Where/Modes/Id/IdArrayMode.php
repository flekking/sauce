<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Id;

trait IdArrayMode
{
    /**
     * @return void
     */
    public function idArrayMode()
    {
        $this->addWhere([
            fn ($query) => $query->whereIn(
                $this->queueColumn,
                $this->value($this->queueIndex, [])
            )
        ]);
    }
}
