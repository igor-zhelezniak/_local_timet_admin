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
       return Plan::where('company_id', $id)->select('type')->get()->first()->type;
    }

    public static function setPlan(){
        if( is_null(Plan::$plan)){
            self::$plan = Plan::getPlan(Auth::user()->company_id);
        }
    }

    public static function checkPlan($plan_type){
        if(is_array($plan_type)){
            if(!in_array(self::$plan, $plan_type)){
                return false;
            }
        }
        else {
            if($plan_type !== self::$plan){
                return false;
            }
        }
        return true;
    }

}