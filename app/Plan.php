<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class Plan extends Model
{
    protected  $table = 'companies_plans';
    protected $fillable = ['company_id', 'expiration', 'status', 'type'];
    public $timestamps = false;

    public static $plan = null;

    public static function getPlan($id){
        if(is_null(self::$plan)){
            $plan = Plan::where('company_id', $id)->select('type')->get()->first();
            if(!is_null($plan)){
                return $plan->type;
            }
            return 1;
        }

       return self::$plan;
    }


    public static function setPlan(){
        if( is_null(Plan::$plan)){
            self::$plan = Plan::getPlan(Auth::user()->company_id);
        }
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
        1 => 5,
        2 => 10,
        3 => INF
    ];

    public static function getLimit(){
        return self::$plan_linmit[Plan::getPlan(Auth::user()->company_id)];
    }

    public static function checkLimit(){
        if(is_null(self::$limit)){
            self::$limit = true;
            $count = User::where('users.id', '!=', Auth::user()->id)
                ->where('users.company_id', Auth::user()->company_id)
                ->count();

            $plan = Plan::getPlan(Auth::user()->company_id);

            if($count >= self::$plan_linmit[$plan]){
                self::$limit = false;
            }
        }
        return self::$limit;
    }

}