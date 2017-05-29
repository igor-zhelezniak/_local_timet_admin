<?php

namespace App\Http\Controllers\Admin;

use App\Customers;
use App\Statuses;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getClients(){
        $user_id = Auth::user()->id;

        $clients = DB::table('clients')
            ->join('clients_users', 'clients.id', '=', 'clients_users.client_id')
            ->join('statuses', 'clients.status', '=', 'statuses.id')
            ->where('clients_users.user_id', $user_id);
        $clients->select('clients.id', 'clients.code', 'clients.name','statuses.status_name');
        return $clients;
    }

    public function showClients(){

        if(Auth::user()->hasRole(1)) {

            $clients = $this->getClients();

            return view('/admin/showClients', ['clients' => $clients->get()]);
        }
        return view('404');
    }

    public function ajaxGetClients(Request $request){

        $clients = $this->getClients();

        if($request->status != 0){
            $clients->where('clients.status', $request->status);
        }

        $clients->select('clients.id', 'clients.code', 'clients.name', 'statuses.status_name');

        $clients = $clients->get();

        $links = [
            'edit' => '/admin/editClient/'/*,
            'delete' => '/admin/deleteClient/'*/
        ];

        return response()->json([
            'titles' => ['ID', 'Code', 'Name', 'Status','Actions'],
            'data' => $clients,
            'links' => $links,
            'status' => !$clients->isEmpty()
        ]);
    }

    public function addClient(){
        if(Auth::user()->hasRole(1)) {

            $status = DB::table('statuses')->get();

            return view('/admin/addClient',['status' => $status]);
        }
        return view('404');
    }
    /*Переделать на транзакции*/
    public function saveClient(Request $request){

        if(Auth::user()->hasRole(1)) {

            if(!empty($request->clientName && $request->clientCode)){
                $new_client_id = DB::table('clients')->insertGetId(
                    [
                        'name' => $request->clientName,
                        'code' => $request->clientCode,
                        'status' => $request->clientStatus,
                    ]
                );

                DB::table('clients_users')->insert(
                    [
                        'client_id' => $new_client_id,
                        'user_id' => Auth::user()->id,
                        'company_id' => Auth::user()->company_id,
                    ]

                );
                return redirect()->action('Admin\CustomerController@showClients');
            }
        }
        return view('404');
    }

    public function editClient(Request $request){

        if(Auth::user()->hasRole(1)) {

            $customer = Customers::find($request->id);

            $status = Statuses::pluck('status_name','id')->all();

            return view('admin/edit/editCustomer', [
                'customer' => $customer,
                'status' => $status
            ]);
        }
        return view('404');
    }

    public  function  saveEditClient(Request $request){
        $customer = Customers::find($request->id);

        if($customer->validate($request->all())){

            $customer->update($request->except(['_token']));

            return redirect()->action('Admin\CustomerController@showClients');
        }
        else {
            return Redirect::back()
                ->withErrors($customer->errors())
                ->withInput(Input::all());
        }
    }
}
