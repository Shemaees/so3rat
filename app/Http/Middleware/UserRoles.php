<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next  , $param)
    {
        if (!Auth::user()->hasRole($param)) 
        {
            return redirect('/')->with(['error' => Auth::user()->status]);
        }
        return $next($request);
    }
}
