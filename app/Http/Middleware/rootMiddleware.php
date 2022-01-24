<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class rootMiddleware
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
        if (Auth::user()->user_type ==1){
            return $next($request);

        }else{
            if (Auth::user()->user_type == 2){
            return redirect('admin/mission');

        }else{
            return redirect('admin/news');

        }        }  
    }
}
