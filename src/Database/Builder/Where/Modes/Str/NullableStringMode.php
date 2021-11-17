<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Str;

trait NullableStringMode
{
    /**
     * @return void
     */
    public function nullableStringMode($leftWildcard = '%', $rightWildCard = '%')
    {
        $queueIndex = $this->queueIndex;
        $queueColumn = $this->queueColumn;
        $request = $this->request;

        $this->addWhere([
            function ($query) use (
                $queueColumn,
                $queueIndex,
                $leftWildcard,
                $rightWildCard,
                $request
            ) {
                $value = $this->value($queueIndex, '');
                return is_null($value) || $value == ''
                    ?   $query->where(
                            $queueColumn,
                            'like', 
                            $leftWildcard.$this->value($queueIndex, '').$rightWildCard
                        )->orWhereNull($queueColumn)
                    :   $query->where(
                            $queueColumn,
                            'like', 
                            $leftWildcard.$this->value($queueIndex, '').$rightWildCard
                        );
            }
        ]);
    }
}
