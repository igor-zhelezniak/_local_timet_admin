<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Statuses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Project;


class ProjectController extends AuthorizationController
{
    public function __construct()
	{
		//$this->middleware('auth');
		parent::__construct();
	}

	public function getProjects(){
        $projects = DB::table('projects')
            ->join('projects_users', 'projects.id', '=', 'projects_users.project_id' )
            ->join('projects_status', 'projects.project_status', '=', 'projects_status.id')
            ->leftJoin('users', 'projects.project_lead', '=', 'users.id')
            ->join('clients as cl', 'projects.project_customer', '=', 'cl.id');

        $projects->where([
            ['projects.company_id', Auth::user()->company_id],
        ]);
        return $projects;
    }

	public function showProjects(){

        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2)){

            $projects = $this->getProjects();

            /*На будущее*/
			if(Auth::user()->hasRole(2)){

            }

            $projects->select('*', 'users.name as uName', 'cl.name as clName');




			return view('/projects/projects', ['projects' => $projects->get()->toArray()]);
		}
		return view('404');
	}

    public function ajaxGetProjects(Request $request){

        $projects = $this->getProjects();

        if($request->status != 0){
            $projects->where('projects.project_status', $request->status);
        }

        $projects->select('projects.id', 'projects.project_type', 'projects.project_name', 'projects.project_description', 'cl.name as clName',
            'projects.project_budget_time', 'projects.project_budget_money', 'users.name as uName', 'status_name');

        $projects = $projects->get();

        $links = [
            'edit' => '/projects/editProject/'/*,
            'delete' => '/projects/deleteUser/'*/
        ];

        return response()->json([
            'titles' => ['ID', 'Type', 'Name','Description', 'Customer','Budget In Time','Budget In Money', 'Lead', 'Status','Actions'],
            'data' => $projects,
            'links' => $links,
            'status' => !$projects->isEmpty()
        ]);
    }
	
	public function addProject(){
		if(Auth::user()->hasRole(1)){
			$user_id = Auth::user()->id;

			$typeOfProjects = DB::table('projects_type')->get();

			$customers = DB::table('clients')
				->join('clients_users', 'clients_users.client_id', '=', 'clients.id')
				->where('clients_users.user_id', $user_id)
				->get();

			$typeOfProjects = $typeOfProjects->toArray();

			$projectLead = DB::table('users')
                ->where('users.company_id', Auth::user()->company_id)
                ->get();

			return view('/projects/add', compact('id', 'name'), ['typeOfProjects' => $typeOfProjects, 'customers' => $customers, 'projectLead' => $projectLead]);
		}
		return view('404');
	}
	
	public function saveProject(Request $request){

		if(Auth::user()->hasRole(1)){
			$user_id = Auth::user()->id;

			$ptype = $request->ptype;

			$project_id = DB::table('projects')->insertGetId(
				[
					'project_type' => $ptype,
					'project_name' => $request->pname,
					'project_description' => $request->pdesc,
					'project_customer' => $request->pcustomer,
					'project_budget_time' => $request->pbudgettime,
					'project_budget_money' => $request->pbudgetmoney,
					'project_lead' => (empty($request->plead)) ? NULL : $request->plead, /*Заменить IF*/
					'project_status' => 1,
                    'company_id' => Auth::user()->company_id,
				]
			);

			DB::table('projects_users')->insert(
				[
					'project_id' => $project_id,
					'user_id' => $user_id
				]
			);

			return redirect()->action('ProjectController@showProjects');
		}
		return view('404');
	}

	public function editproject(Request $request){

        if(Auth::user()->hasRole(1)) {

            $user_id = Auth::user()->id;

            $project = Projects::find($request->id);

            $typeOfProjects = DB::table('projects_type')->pluck('type_name', 'projects_type.id');

            $customers = DB::table('clients')
                ->join('clients_users', 'clients_users.client_id', '=', 'clients.id')
                ->where('clients_users.user_id', $user_id)
                ->pluck('name', 'clients.id');

            $status = Statuses::pluck('status_name','id')->all();

            $projectLead = DB::table('users')
                ->where('users.company_id', Auth::user()->company_id)
                ->pluck('name', 'users.id');

            /*$status = Statuses::pluck('status_name','id')->all();*/

            return view('projects/edit', [
                'project' => $project,
                'typeOfProjects' => $typeOfProjects,
                'customers' => $customers,
                'projectLead' => $projectLead,
                'status' => $status
            ]);
        }
        return view('404');
    }

    public function saveEditProject(Request $request){
        $project = Projects::find($request->id);

        if($project->validate($request->all())){

            $project->update($request->except(['_token']));

            return redirect()->action('ProjectController@showProjects');
        }
        else {
            return Redirect::back()
                ->withErrors($project->errors())
                ->withInput(Input::all());
        }
    }
	
}
