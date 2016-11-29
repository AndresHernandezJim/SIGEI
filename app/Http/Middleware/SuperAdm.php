<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdm
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
        if (!session()->has('SuperAdm')){
            return back();
        }
        
        return $next($request);
    }
}
