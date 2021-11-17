<?php

namespace Fk\Sauce\Database\Builder\Where\Modes\Date;

trait DateBetweenMode
{
    /**
     * @return void
     */
    public function dateBetweenMode()
    {
        $this->add([
            fn ($query) => 
                $query->whereBetween($this->queueColumn,
                    [
                        $this->value($this->queueIndex[0], date('Y-m-d')),
                        $this->value($this->queueIndex[1], date('Y-m-d'))
                    ]
                )
        ]);
    }
}
