<?php

namespace App\Http\Middleware;
use App\user;
use Closure;
use Auth;

class user_outerMiddleware
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
        if(Auth::check() && Auth::user()->role == '1')
        return redirect()->route('/');
        else
             
        return $next($request);
    }
}
