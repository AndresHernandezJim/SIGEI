<?php

namespace App\Http\Middleware;

use Closure;

class PsicoMdl
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
        if (!session()->has('Psicologo')) {
            return back();
        }
        
        return $next($request);
    }
}
