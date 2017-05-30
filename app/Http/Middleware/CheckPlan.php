<?php

namespace App\Http\Middleware;

use App\Plan;
use Closure;

class CheckPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$plan_type)
    {
        if(!Plan::checkPlan($plan_type)){
            return redirect()->back();
        }
        return $next($request);

    }
}
