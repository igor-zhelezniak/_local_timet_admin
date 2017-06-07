<?php

namespace App\Http\Middleware;

use App\Plan;
use App\User;
use Closure;

class CheckUserLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if(!Plan::checkLimit($type)){
            return redirect()->back();
        }
        return $next($request);
    }
}
