<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Session;

class VerifyApiToken extends VerifyCsrfToken
{
    public function handle($request, Closure $next)
    {
        if (! $request->session()->exists('api_token') or $request->session()->get('api_token') != $request->input('api_token')) {
            return new Response(view('errors.forbidden'));
        }

        return $next($request);
    }
} 