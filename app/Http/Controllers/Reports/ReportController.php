<?php

namespace App\Http\Controllers\Reports;

use App\CompanyInfo;
use App\Http\Controllers\AuthorizationController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends AuthorizationController
{
    public function __construct(){
        //$this->middleware('auth');
        parent::__construct();
    }


    public function showReport(){

        $users = DB::table('users')
            ->where('users.company_id', Auth::user()->company_id);


        $customers = DB::table('clients')
            ->join('clients_users', 'clients.id', '=', 'clients_users.client_id');

        $customers->where([
            ['clients_users.company_id', Auth::user()->company_id]
        ]);

        if(!Auth::user()->hasRole(1) && !Auth::user()->hasRole(2)){

        }


        if(!Auth::user()->hasRole(1) && !Auth::user()->hasRole(2)){
            $users->where([
                ['users.id', '=', Auth::user()->id]
            ]);
        }

        $projects = DB::table('projects')
            ->where('projects.company_id', Auth::user()->company_id);

        $categories = DB::table('categories')
            ->join('categories_users', 'categories.id', '=', 'categories_users.category_id');

        $categories->where([
            ['categories_users.company_id', Auth::user()->company_id]
        ]);

        $timesheet = DB::table('timesheet')
            ->where('user_id', Auth::user()->id)
            ->get();

        $time_nominal = CompanyInfo::where('id', Auth::user()->company_id)->select('nominal')->first();
        switch ($time_nominal->nominal){
            case 1: $time_nominal = 'decimal'; break;
            case 2: $time_nominal = 'hour'; break;
        }

        $groupBy = [
            null => 'Select Item',
            1 => 'Users',
            2 => 'Users / Projects',
        ];


        return view('/reports/reports', [
            'timesheet'=>$timesheet,
            'users' => $users->get(),
            'customers' => $customers->get(),
            'projects' => $projects->get(),
            'categories' => $categories->get(),
            'nominal' => $time_nominal,
            'groupBy' => $groupBy,
        ]);
    }

    public function showReportResult(Request $request, $response_type, $time_notation){
        if(empty($request->dateFrom)){
            $request->dateFrom = date('Y-d-m');
        }

        if(empty($request->dateTo)){
            $request->dateTo = date('Y-d-m');
        }


        $result = DB::table('timesheet')
            ->leftJoin('users', 'timesheet.user_id', '=', 'users.id')
            ->leftJoin('projects', 'timesheet.project_id', '=', 'projects.id')
            ->leftJoin('categories', 'timesheet.category_id', '=', 'categories.id')
            ->leftJoin('clients', 'projects.project_customer', '=', 'clients.id');

        $result->where('users.company_id', Auth::user()->company_id);

        if(!Auth::user()->hasRole(1) && !Auth::user()->hasRole(2)){
            if(!empty($request->userName)){
                $result->where('timesheet.user_id', $request->userName);
            } else{
                $result->where('timesheet.user_id', Auth::user()->id);
            }
        } else {
            if(!empty($request->userName)){
                $result->where('timesheet.user_id', $request->userName);
            }
        }

        if(!empty($request->projectName)) {
            $result->where('timesheet.project_id', $request->projectName);
        }

        if(!empty($request->categoriesName)) {
            $result->where('timesheet.category_id', $request->categoriesName);
        }

        if(!empty($request->customerName)) {

            $result->where('clients.id', $request->customerName);
        }

        $result->whereBetween('timesheet.logged_date', array($request->dateFrom, $request->dateTo));

        /*$result->select('timesheet.*', 'clients.name as clientName', 'users.name as userName', 'projects.project_name as projectName',
            'categories.name as categoryName');*/

        $result->select('timesheet.logged_date', 'users.name as userName', 'projects.project_name as projectName', 'categories.name as categoryName',
           'timesheet.description', 'timesheet.worked_time');


        $groupBy = false;
        $titles = ['Date', 'Name', 'Project', 'Categories', 'Description', 'Time'];

        if(!empty($request->groupBy)) {
            switch ($request->groupBy){
                case 1:
                    $result->groupBy('timesheet.user_id');
                    $result->select('users.name as userName',  DB::raw('SEC_TO_TIME( SUM( TIME_TO_SEC( `worked_time` ) ) ) as time'));
                    $groupBy = true;
                    $titles = ['User Name', 'Time'];
                    break;
                case 2:
                    $result->groupBy( DB::raw('concat(user_id, \'-\', project_id)'));
                    $result->select('users.name', 'projects.project_name',  DB::raw('SEC_TO_TIME( SUM( TIME_TO_SEC( `worked_time` ) ) ) as time'));
                    $groupBy = 'user-project';
                    $titles = ['Project', 'Time'];
                    break;
            }

        }

        $result->orderBy('timesheet.logged_date');

        switch ($response_type){
            case 'json':
                $result = $result->get();

                if($request->groupBy == 2){
                    $result = $this->prepareUsersProjects($result);
                }

                return response()->json([
                'data' => $result,
                'titles' => $titles,
                'status' => true,
                'groupBy' => $groupBy
            ]);
                break;
            case 'excel':
                return $this->exportToExcelFile($result, 'xlsx',$time_notation);
                break;
            case 'pdf':
                return $this->exportToPdfFile($result, $time_notation);
                break;
        }

    }

    private function prepareUsersProjects($data){

        foreach ($data as $item) {
            $name = $item->name;
            unset($item->name);
            $result[$name][] = $item;
        }
        return $result;
    }

    private function exportToPdfFile($data, $time_notation){

       $data->select('logged_date', 'users.name as userName', 'projects.project_name as projectName',
           'categories.name as categoryName', 'timesheet.description', 'worked_time');

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML((string) view('pdf.pdf', ['data' => $data->get(), 'time_notation' => $time_notation]));

        $response =  array(
            'name' => "TimetReport.pdf",
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($pdf->stream())
        );
        return response()->json($response);
    }

    private function decimalHours($time)
    {
        $hms = explode(":", $time);
        return ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
    }

    private function exportToExcelFile($data, $format, $time_notation){

        $data->select('logged_date', 'users.name as userName', 'projects.project_name as projectName', 'categories.name as categoryName', 'timesheet.description', 'worked_time');

        $result_array[] = ['Date', 'Name','Project','Cetegories','Description', 'Time'];

        foreach ($data->get() as $item) {
            $tmp = (array)$item;

            if($time_notation == 'decimal'){
                $tmp['worked_time'] = sprintf("%.2f", $this->decimalHours($tmp['worked_time']));
            }
            $result_array[] = $tmp;
        }


        $file = Excel::create('Report', function($excel) use ($result_array){

            $excel->setTitle('Report');
            $excel->setCreator('Timet')->setCompany('Timet');
            $excel->setDescription('report file');


            $excel->sheet('sheet1', function($sheet) use ($result_array) {
                $sheet->fromArray($result_array, null, 'A1', false, false);
            });

        });

        $file = $file->string($format);

        $response =  array(
            'name' => "TimetReport." . $format,
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($file)
        );
        return response()->json($response);

    }
}
