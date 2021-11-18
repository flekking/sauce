<?php

namespace Fk\Sauce\Transformer;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class RelatedCollection extends ResourceCollection
{
    /**
     * Constructor.
     */
    public function __construct(...$args)
    {
        $this->collects = $this->collects();
        parent::__construct(...$args);
    }

    /**
     * @return string
     */
    protected function collects()
    {
        return '';
    }
    
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
