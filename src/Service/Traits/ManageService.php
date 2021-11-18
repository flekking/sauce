<?php

namespace Fk\Sauce\Service\Traits;

trait ManageService
{
    /**
     * @param  \Fk\Sauce\Service\Service  $service
     * @param  \Illuminate\Http\Request  $request
     * @param  ...$args
     * @return void
     */
    public function manage(Service $service, $request, ...$args)
    {
        return $service->serve($request, ...$args);
    }
}
