<?php

namespace Fk\Database\Eloquent;

trait Extent
{
    /**
     * Scope the multiple scope.
     * Any models that wish to use ExtentBuilder must use this trait.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  array  $scopes
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExtent($query, $scopes)
    {
        foreach ($scopes as $scope) $query = $query->{$scope}();
        
        return $query;
    }
}
