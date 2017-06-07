<?php

namespace App\Http\Controllers\Admin;

use App\CompanyInfo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use Image;

class AddNewUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    private function getUsers(){
        $users = DB::table('users')
            ->join('statuses', 'users.status', '=', 'statuses.id')
            ->join('roles', 'users.role', '=', 'roles.id');


        if(Auth::user()->hasRole(1)){

            $users->where([
                ['users.company_id', Auth::user()->company_id],
                ['users.id', '!=', Auth::user()->id]
            ]);
        }
        else{
            $users->where('users.user_parent', Auth::user()->id);
        }
        $users->select('users.*', 'statuses.status_name as statusName', 'roles.role_name as roleName');

        $users->orderBy('id', 'desc');

        return $users;
    }

    public function showUsers(){

        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2)) {

            $users = $this->getUsers();

            return view('/admin/showUsers', ['users' => $users->get()]);
        }
        return view('404');
    }

    public function ajaxGetUsers(Request $request){

        $users = $this->getUsers();

        if($request->status != 0){
            $users->where('users.status', $request->status);
        }

        $users->select('users.id', 'users.name', 'users.email', 'roles.role_name as roleName', 'statuses.status_name');

        $users = $users->get();

        $links = [
            'edit' => '/admin/editUser/'/*,
            'delete' => '/admin/deleteUser/'*/
        ];

        return response()->json([
            'titles' => ['ID', 'Name', 'Email','Role', 'Status','Actions'],
            'data' => $users,
            'links' => $links,
            'status' => !$users->isEmpty()
        ]);
    }

    public function addUser()
    {
        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2)) {
            $user_id = Auth::user()->id;

            $user_parent = DB::table('users')
                ->where('users.id', $user_id)
                ->first();

            if(!$user_parent->user_parent){
                $parent = $user_id;
            }
            else{
                $parent = $user_parent->user_parent;
            }

            $departments = DB::table('departments')
                ->join('departments_users', 'departments_users.department_id', '=', 'departments.id')
                ->where('departments_users.user_id', $parent)
                ->get();

            $roles = DB::table('roles')->get();

            if(Auth::user()->hasRole(2)){
                $roles = DB::table('roles')->where('id', '!=', 1)->get();
            }

            $status = DB::table('statuses')->get();


            return view('admin/addUser', ['departments' => $departments, 'roles' => $roles, 'status' => $status]);
        }
        return view('404');
    }
/*Переделать на транзакции*/
    public function saveUser(Request $request){

        Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|between:6,8|confirmed', //перепроверить
        ]);

        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2)) {

            $user = new User;

            if($user->validate($request->all())) {
                $new_user_id = DB::table('users')->insertGetId(
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'role' => $request->role,
                        'status' => $request->status,
                        'user_parent' => Auth::user()->id,
                        'company_id' => Auth::user()->company_id,
                    ]
                );

                DB::table('users_departments')->insert(
                    [
                        'department_id' => $request->department,
                        'user_id' => $new_user_id,
                    ]
                );

                DB::table('users_roles')->insert(
                    [
                        'user_id' => $new_user_id,
                        'role_id' => $request->role,
                    ]
                );
                return redirect()->action('Admin\AddNewUserController@showUsers');
            }
            else {
                return Redirect::back()
                    ->withErrors($user->errors())
                    ->withInput();
            }
        }
        return view('404');
    }

    public function profileInfo(){
        if(Auth::user()->hasRole(1) or true){
            $timezones = DB::table('timezones')->pluck('timezone', 'id');
            $company = CompanyInfo::findOrFail(Auth::user()->company_id);
            $user = User::findOrFail(Auth::user()->id);

            $nominals = [
                '1.15 = час и 15 минут',
                '1:15 = час и 15 минут'
            ];

            $cities = [];

           /* if(!is_null($company->country)){
                $cities = $this->getCityByCountry($company->country);
            }*/


            return view('user/profile')
                /*->with('countries', $this->getCountriesList())*/
                ->with('timezones', $timezones)
                ->with('company', $company)
                ->with('user', $user)
                ->with('cities', $cities)
                ->with('nominals', $nominals);
        }
        return view('user/profile');
    }

    public function ajaxGetCity(\Illuminate\Http\Request $request){
        echo json_encode($this->getCityByCountry($request->code));
        exit;
    }

    protected function getCountriesList()
    {
        $arr = json_decode(file_get_contents('http://api.geonames.org/countryInfoJSON?username=honey123'), true);
        $countries = false;
        foreach ($arr['geonames'] as $key => $item){
            $countries[$item['countryCode']] = $item['countryName'];
        }
        return $countries;
    }

    protected function getCityByCountry($countryCode = 'UA'){
        $arr = json_decode(file_get_contents('http://api.geonames.org/searchJSON?country=' . $countryCode . '&username=honey123'), true);
        $cities = false;
        foreach ($arr['geonames'] as $key => $item){
            $cities[$item['name']] = $item['name'];
        }
        return $cities;
    }

    public function updateProfile(Request $request){

        if(!empty($request->inputName) || $request->inputEmail){

            $request->inputName;
            $request->inputEmail;
            $request->inputExperience;
            $request->inputSkills;

            $this->validate($request,[
                'email' => 'unique:users'
            ]);

            $res = DB::table('users')
                ->where('id', Auth::user()->id);

            if(!empty($request->inputName)){
                $res->update(['name' => $request->inputName]);
            }

            if(!empty($request->inputEmail)){
                $res->update(['email' => $request->inputEmail]);
            }

            if(!empty($request->inputExperience)){

            }

            if(!empty($request->inputSkills)){

            }

            return response()->json([
                'message' => 'Profile updated!',
                'type' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'Profile not updated!',
            'type' => 'danger'
        ]);
    }

    public function uploadUserPhoto(Request $request)
    {
        //dd($request->all());
        $logoDirectoryPath = 'uploads/users/profile/' . Auth::user()->company_id . '/' . Auth::user()->id . '/';
        $companyLogoName = 'profile-image.';

        $userInfo = DB::table('users')
            ->where('users.id', $request->id)
            ->first();

        if($request->isMethod('post')){
            if ($request->hasFile('user_photo')) {
                $file = $request->file('user_photo');
                $extension = $file->getClientOriginalExtension();
                $image_name = $companyLogoName . $extension;

                $file->move($logoDirectoryPath, $image_name);
                Image::make(sprintf($logoDirectoryPath . '%s', $image_name))->crop((int)$request->width,
                    (int)$request->height, (int)$request->x, (int)$request->y)->/*resize(200, 200)->*/save();

                DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update(['profile_img' => $image_name]);

                echo sprintf($logoDirectoryPath . '%s', $image_name);
                exit;
                //return redirect()->back()->with('status', 'Profile updated!');
            }
        }
        exit;
        //return redirect()->action('Admin\AddNewUserController@showUsers');
    }



    public function editUser(Request $request){

        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2)) {

            $userInfo = DB::table('users')
                ->where('users.id', $request->id)
                ->first();

            $departments = DB::table('departments')
                ->join('departments_users', 'departments_users.department_id', '=', 'departments.id')
                ->where('departments_users.user_id', Auth::user()->id)
                ->pluck('departments.department_name', 'departments.id');

            $userDepartment = DB::table('departments_users')
                ->where('departments_users.user_id', '=',  $userInfo->id)->get();

            $roles = DB::table('roles')->pluck('role_name', 'id');

            if(Auth::user()->hasRole(2)){
                $roles = DB::table('roles')->where('id', '!=', 1)->pluck('role_name', 'id');
            }

            $status = DB::table('statuses')->pluck('status_name', 'id');

            return view('admin/edit/editUser', [
                'user_id' => $request->id,
                'user_name' => $userInfo->name,
                'user_email' => $userInfo->email,
                'departments' => $departments,
                'userInfo' => $userInfo,
                'roles' => $roles,
                'status' => $status,
                'userDepartment' => $userDepartment
            ]);
        }
        return view('404');
    }

    public function saveEditUser(Request $request){


        Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|between:6,8|confirmed'
        ]);


        DB::table('users')
            ->where('id', $request->uId)
            ->update([
                'name' => $request->uName,
                'email' => $request->uEmail,
                'password' => bcrypt($request->uPassword),
                'role' => $request->uRole,
                'status' => $request->uStatus,
            ]);

        DB::table('users_departments')
            ->where(
            [
                'user_id' => $request->uId,
            ])
            ->update([
                'department_id' => $request->uDepartment,
            ]);

        DB::table('users_roles')
            ->where(
            [
                'user_id' => $request->uId,
            ])
            ->update([
                'role_id' => $request->uRole
            ]);

        return redirect()->action('Admin\AddNewUserController@showUsers');
    }
}
