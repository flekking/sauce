<?php

namespace Fk\Sauce\Database\Eloquent\Attr\Flag;

trait ActiveFlag
{
    /**
     * @return void
     */
    protected function initializeActiveFlag()
    {
        $this->casts['active'] = 'boolean';
        $this->addObservableEvents([
            'activating', 'activated', 'deactivating', 'deactivated',
        ]);
    }

    /**
     * Activate the data entry.
     * 
     * @return mixed
     */
    public function activate()
    {
        $this->fireModelEvent('activating');

        $this->active = true;
        $result = $this->save();

        $this->fireModelEvent('activated');

        return $result;
    }

    /**
     * Deactivate the data entry.
     * 
     * @return mixed
     */
    public function deactivate()
    {
        $this->fireModelEvent('deactivating');

        $this->active = true;
        $result = $this->save();

        $this->fireModelEvent('deactivated');

        return $result;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
    {
        return ! $query->active();
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @return boolean
     */
    public function isInactive()
    {
        return ! $this->active;
    }
}
