<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Str;

trait StringMode
{
    /**
     * @return void
     */
    public function stringMode($leftWildcard = '%', $rightWildCard = '%')
    {
        $this->addWhere([
            $this->queueColumn,
            'like',
            $leftWildcard.$this->value($this->queueIndex, '').$rightWildCard
        ]);
    }
}
