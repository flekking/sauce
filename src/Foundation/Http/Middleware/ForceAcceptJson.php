<?php

namespace Fk\Sauce\Foundation\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceAcceptJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->add(['Accept' => 'application/json']);

        return $next($request);
    }
}
