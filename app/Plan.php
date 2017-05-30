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

}