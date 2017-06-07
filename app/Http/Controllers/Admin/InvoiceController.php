<?php

namespace App\Http\Controllers\Admin;

use App\CompanyInfo;
use App\Customers;
use App\Departments;
use App\Projects;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class InvoiceController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){

        $customers = DB::table('clients')
            ->join('clients_users', 'clients.id', '=', 'clients_users.client_id');

        $customers->where([
            ['clients_users.company_id', Auth::user()->company_id]
        ]);

       // $projects = Projects::where('project_customer', $customers->first()->id);
        $time_nominal = CompanyInfo::where('id', Auth::user()->company_id)->select('nominal')->first();
        switch ($time_nominal->nominal){
            case 1: $time_nominal = 'decimal'; break;
            case 2: $time_nominal = 'hour'; break;
        }

        return view('invoice.index', [
            'customers' => $customers->pluck('clients.name', 'clients.id'),
            'nominal' => $time_nominal,
          //  'projects' => $projects->pluck('project_name', 'id'),
        ]);
    }

    public function ajaxGetProjects($customer_id){
        $projects = Projects::where('project_customer', $customer_id);
        return response()->json($projects->get());
    }

    public function ajaxGetInvoice(Request $request){

        if(empty($request->dateFrom)){
            $request->dateFrom = date('Y-d-m');
        }

        if(empty($request->dateTo)){
            $request->dateTo = date('Y-d-m');
        }


        $result = DB::table('timesheet')
            ->join('projects', 'timesheet.project_id', '=', 'projects.id')
            ->join('clients', 'projects.project_customer', '=', 'clients.id');

        $result->where('projects.company_id', Auth::user()->company_id);

        if(!empty($request->projectName)) {
            $result->where('timesheet.project_id', $request->projectName);
        }

        if(!empty($request->customerName)) {
            $result->where('clients.id', $request->customerName);
        }

        $result->whereBetween('timesheet.logged_date', array($request->dateFrom, $request->dateTo));

        $result->select('clients.name', 'clients.id', 'projects.project_name', 'projects.id as project_id' ,'timesheet.worked_time');

        $result->orderBy('timesheet.logged_date');

        return response()->json([
            'data' => $result->get(),
            'from' => $request->dateFrom,
            'to' => $request->dateTo
        ]);
    }

    public function ajaxCreateInvoice(Request $request){
        return response()->json($this->exportToPdfFile($request->all()));
    }

    private function exportToPdfFile($item){

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML((string) view('pdf.invoice', ['item' => $item]));

        //dd($item);

        $response =  array(
            'name' => "Invoice.pdf",
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($pdf->stream())
        );

        return $response;
    }
}
