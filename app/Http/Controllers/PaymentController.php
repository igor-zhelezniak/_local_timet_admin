<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Plan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaymentController extends AuthorizationController
{
    public function __construct()
	{
		//parent::__construct();
	}

	public function fixPayment(Request $request){
        $company_id = $request->company_id;
        $plan_type = $request->plan_type;

        $months = DB::table('payment_plan')->select('mounths')->where('type', $plan_type)->first()->mounths;

        $plan = Plan::where('company_id', $company_id)->first();

        if(is_null($plan)){

            Plan::create([
                'company_id' => $company_id,
                'expiration' =>  Carbon::now()->addMonth($months)->toDateString(),
                'start_date' =>  Carbon::now()->toDateString(),
                'type' => $plan_type
            ]);
            return 'created';
        }

        $plan->expiration =  Carbon::now()->addMonth($months)->toDateString();
        $plan->start_date = Carbon::now()->toDateString();
        $plan->type = $plan_type;
        $plan->save();
        return 'updated';
    }
	
}
