<?php


namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class Plan extends Model
{
    protected  $table = 'companies_plans';
    protected $fillable = ['company_id', 'expiration', 'status', 'type', 'start_date'];
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
            1 => 1,
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
        ]
    ];

    public static function getLimit($type){
        return self::$plan_linmit[$type][Plan::getPlan(Auth::user()->company_id)];
    }

    private static function getCountUsers(){
        return User::where('users.id', '!=', Auth::user()->id)
            ->where('users.company_id', Auth::user()->company_id)->count();
    }

    private static function getCountProjects(){
        return Projects::where('company_id', Auth::user()->company_id)->count();
    }

    private static function getCountClients(){
        return DB::table('clients_users')->where('company_id', Auth::user()->company_id)->count();
    }

    private static function getCountCategories(){
        return DB::table('categories_users')->where('company_id', Auth::user()->company_id)->count();
    }

    public static function checkLimit($type){
        if(is_null(self::$limit)){
            self::$limit = true;

            switch ($type){
                case 'users':
                    $count = self::getCountUsers();
                    break;
                case 'projects':
                    $count = self::getCountProjects();
                    break;
                case 'clients':
                    $count = self::getCountClients();
                    break;
                case 'categories':
                    $count = self::getCountCategories();
                    break;
            }

            $plan = Plan::getPlan(Auth::user()->company_id);

            if($count >= self::$plan_linmit[$type][$plan]){
                self::$limit = false;
            }
        }
        return self::$limit;
    }

    /* functions to block company */

    public static function checkUnactivePayment(){
        $plan = Plan::where('company_id', Auth::user()->company_id)->first();
        $status = $plan->status;

        if($status == 0){
            $arr['users'] = self::getCountUsers();
            $arr['projects'] = self::getCountProjects();
            $arr['clients'] = self::getCountClients();
            $arr['categories'] = self::getCountCategories();

            $flag = true;

            foreach ($arr as $key => $value){
                if($value > self::$plan_linmit[$key][1]){
                    $flag = false;
                }
            }

            if($flag){
                self::updatePlanToFree($plan);
            }else {
                self::blockCompany();
            }
        }
    }

    private static function updatePlanToFree($plan){
        $plan->type = 1;
        $plan->status = 1;
        $plan->expiration = Carbon::now()->addMonth(999)->toDateString();
        $plan->start_date = Carbon::now()->toDateString();
        $plan->save();
    }

    private static function blockCompany(){
        var_dump('session');
        Session::put('blocked', true);
    }

}