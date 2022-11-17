<?php

namespace App\Http\Middleware;

 
use Closure;
use Illuminate\Support\Facades\Auth;

class BlockuserMiddleware
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
        if (auth()->check()) 
                {
                if (Auth::user()->block == 1) {  
                    auth()->logout();
                     
                    return redirect()->route('login')->with('message', trans('You Are Blocked '));
                        
                    }            
                    }      
                    return $next($request);   
  } 
    

}


 
