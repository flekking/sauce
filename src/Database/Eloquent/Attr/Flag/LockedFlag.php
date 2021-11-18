<?php

namespace Fk\Sauce\Database\Eloquent\Attr\Flag;

trait LockedFlag
{
    /**
     * @return void
     */
    public static function bootLockedFlag()
    {
        self::creating(function ($model) {
            $model->locked = false;
        });
        self::updating(function ($model) {
            if ($model->locked) {
                return false;
            }
            $model->locked = false;
        });
        self::deleting(function ($model) {
            if ($model->locked) {
                return false;
            }
        });
    }
    
    /**
     * @return void
     */
    protected function initializeLockedFlag()
    {
        $this->casts['locked'] = 'boolean';
    }

    /**
     * @return boolean
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @return boolean
     */
    public function isNotLocked()
    {
        return ! $this->locked;
    }
}
