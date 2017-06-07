<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $plan = Plan::setPlan();
            View::share('company_plan', Plan::getPlanName());
            return $next($request);
        });

        if(Session::get('blocked') == true){
            dd('lkfjkh');
            return Redirect::back();
        }
    }
}
