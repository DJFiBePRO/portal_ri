<?php

namespace App\Http\Middleware;

use Closure;

class registerMiddleware
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
       $resul = \App\user::find(1); 
       if (!$resul){
        return $next($request);

        }else{
            return redirect('acceso');
        } 
    }
}
