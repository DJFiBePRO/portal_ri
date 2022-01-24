<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class vinMiddleware
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
        if (Auth::user()->user_type !=3){
            return $next($request);

        }else{
            if (Auth::user()->user_type == 1){
                return redirect('admin/inicio');

            }else{
                return redirect('admin/mission');

            }
        }         
    }
}
