<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;

class Plan extends Model
{
    protected  $table = 'companies_plans';
    protected $fillable = ['company_id', 'expiration', 'status', 'type'];
    public $timestamps = false;

    public static $plan = null;
    public static $plan_name = null;

    public static function getPlan($id){
        if(is_null(self::$plan)){
            $plan = Plan::where('company_id', $id)->select('type')->get()->first();
            if(!is_null($plan)){
                self::$plan = $plan->type;
            }
            else {
                self::$plan = 1;
            }
        }

       return self::$plan;
    }

    public static function getPlanName(){
        if(is_null(self::$plan_name)){

            $plan = DB::table('payment_plan')->where('type', self::$plan)->select('name')->get()->first();

            self::$plan_name = $plan->name;

        }

        return self::$plan_name;
    }


    public static function setPlan(){
        if( is_null(Plan::$plan)){
            self::$plan = Plan::getPlan(Auth::user()->company_id);
        }
        return self::$plan;
    }

    public static function checkPlan($plan_type){

        if(!is_array($plan_type)) $plan_type[] = $plan_type;

        if(!in_array(self::getPlan(Auth::user()->id), $plan_type)){
            return false;
        }
        return true;
    }

    /* for limiting users in company */

    private static $limit = null;

    private static $plan_linmit = [
        'users' => [
            1 => 5,
            2 => INF,
        ],
        'projects' => [
            1 => 5,
            2 => INF,
        ],
        'clients' => [
            1 => 5,
            2 => INF,
        ],
        'categories' => [
            1 => 15,
            2 => INF,
        ],
        /*1 => 3,
        2 => 10,
        3 => INF*/
    ];

    public static function getLimit($type){
        return self::$plan_linmit[$type][Plan::getPlan(Auth::user()->company_id)];
    }

    public static function checkLimit($type){
        if(is_null(self::$limit)){
            self::$limit = true;

            switch ($type){
                case 'users':
                    $count = User::where('users.id', '!=', Auth::user()->id)
                        ->where('users.company_id', Auth::user()->company_id);
                    break;
                case 'projects':
                    $count = Projects::where('company_id', Auth::user()->company_id);
                    break;
                case 'clients':
                    $count = DB::table('clients_users')->where('company_id', Auth::user()->company_id);
                    //$count = Projects::where('company_id', Auth::user()->company_id);
                    break;
                case 'categories':
                    $count = DB::table('categories_users')->where('company_id', Auth::user()->company_id);
                    break;
            }

            $count = $count->count();

            $plan = Plan::getPlan(Auth::user()->company_id);

            if($count >= self::$plan_linmit[$type][$plan]){
                self::$limit = false;
            }
        }
        return self::$limit;
    }

}