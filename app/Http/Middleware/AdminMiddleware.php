<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 1 for admin
        if(Auth::check()){
            if(Auth::user()->role_as ==1){
                return $next($request);
            }
            else {
                return redirect('/login')->with('message', 'Access Denied! user not admin');
            }
        }
        else{
            return redirect('/login')->with('message', 'Please Login First');
        }
    }
}
