<?php

namespace Fk\Sauce\Widget\Traits;

use Fk\Sauce\Widget\Widget;

trait RevealWidget
{
    /**
     * @param  \Fk\Sauce\Widget\Widget  $widget
     * @param  \Illuminate\Http\Request  $request
     * @param  ...$args
     * @return void
     */
    public function reveal(Widget $widget, $request, ...$args)
    {
        return $widget->touch($request, ...$args);
    }
}
