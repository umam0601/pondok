<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class auth_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_admin != '1') {
            return redirect()->route('frontend.index');
        }
        return $next($request);
    }
}
