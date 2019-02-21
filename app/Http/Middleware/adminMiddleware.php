<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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
        # permite saber si un usuario ha iniciado sesion
        
        if(auth()->user()){
            if(!auth()->user()->admin)
                return redirect('/');
        }else
            return redirect('/login');
        
        return $next($request);
    }
}
