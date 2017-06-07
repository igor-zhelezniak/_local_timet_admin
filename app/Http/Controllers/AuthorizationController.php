<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 10.03.2017
 * Time: 0:06
 */

namespace App\Http\Controllers;
use App\Plan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AuthorizationController extends Controller
{
    protected $roles = null;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        /*$this->middleware(function ($request, $next) {
            $plan = Plan::setPlan();
            dd($plan);
            return $next($request);
        });*/

        $res = DB::table('roles')->get();

        foreach($res as $val){
            $this->roles[$val->role_name] = $val->id;
        }


    }

    public function getCompanyName(){
        $companyName = DB::table('companies')
            ->where('companies.id', Auth::user()->company_id)
            ->get();
        var_dump($companyName);
        return $companyName;
    }
}