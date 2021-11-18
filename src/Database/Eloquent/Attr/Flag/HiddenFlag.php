<?php

namespace Fk\Sauce\Database\Eloquent\Attr\Flag;

trait HiddenFlag
{
    /**
     * @return void
     */
    public static function bootHiddenFlag()
    {
        self::creating(function ($model) {
            $model->attributes['hidden'] = false;
        });
        self::updating(function ($model) {
            if ($model->attributes['hidden']) {
                return false;
            }
            $model->attributes['hidden'] = false;
        });
        self::deleting(function ($model) {
            if ($model->attributes['hidden']) {
                return false;
            }
        });
    }

    /**
     * @return void
     */
    protected function initializeHiddenFlag()
    {
        $this->casts['hidden'] = 'boolean';
    }

    /**
     * @return boolean
     */
    public function isHidden()
    {
        return $this->attributes['hidden'];
    }

    /**
     * @return boolean
     */
    public function isNotHidden()
    {
        return ! $this->attributes['hidden'];
    }
}
