<?php

namespace App\Http\Middleware;
use App\Role;
use Closure;

class ApprovalMiddleware
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
        if (auth()->check()) {
            if (auth()->user()->approved==0) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('Your Account Needs Admin Approval :( '));
            }
            if (auth()->user()->approved==2) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('You are not Approved '));
            }

        }

        return $next($request);
    }
}
