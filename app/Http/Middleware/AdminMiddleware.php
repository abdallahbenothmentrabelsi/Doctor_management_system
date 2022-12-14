<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::user()->usertype == 'Admin')
        {
            return $next($request);
        } 
        else
        {
            return abort(403,'You Are Not Allowed To Admin Dashboard');
             
        }
       
    }
}
