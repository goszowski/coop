<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;

use Closure;
use Auth;

class AuthActive
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->user()->is_active) {
            return new Response(view('errors.noactive'));
        }

        return $next($request);
    }

}
