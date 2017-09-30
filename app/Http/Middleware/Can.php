<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;

use Closure;

class Can
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! $request->user()->can($permission)) {
            return new Response(view('errors.forbidden'));
        }

        return $next($request);
    }

}
