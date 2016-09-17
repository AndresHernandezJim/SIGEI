<?php

namespace App\Http\Middleware;

use Closure;

class PoliMdl
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
        if (!session()->has('Policia')){
            return back();
        }
        
        return $next($request);
    }
}
