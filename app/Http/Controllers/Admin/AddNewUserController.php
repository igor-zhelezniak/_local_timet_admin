<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use Image;

class AddNewUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showUsers(){

        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2)) {

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

            return view('/admin/showUsers', ['users' => $users->get()]);
        }
        return view('404');
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

            $new_user_id = DB::table('users')->insertGetId(
                [
                    'name' => $request->uName,
                    'email' => $request->uEmail,
                    'password' => bcrypt($request->uPassword),
                    'role' => $request->uRole,
                    'status' => $request->uStatus,
                    'user_parent' => Auth::user()->id,
                    'company_id' => Auth::user()->company_id,
                ]
            );

            DB::table('users_departments')->insert(
                [
                    'department_id' => $request->uDepartment,
                    'user_id' => $new_user_id,
                ]
            );

            DB::table('users_roles')->insert(
                [
                    'user_id' => $new_user_id,
                    'role_id' => $request->uRole,
                ]
            );
            return redirect()->action('Admin\AddNewUserController@showUsers');
        }
        return view('404');
    }

    public function profileInfo(){
        return view('user/profile');
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

        $logoDirectoryPath = 'uploads/users/profile/' . Auth::user()->company_id . '/' . $request->userId . '/';
        $companyLogoName = 'profile-image.';

        $userInfo = DB::table('users')
            ->where('users.id', $request->id)
            ->first();

        if($request->isMethod('post')){
            if ($request->hasFile('userProfileFile')) {
                $file = $request->file('userProfileFile');
                $extension = $file->getClientOriginalExtension();
                $image_name = $companyLogoName . $extension;

                $file->move($logoDirectoryPath, $image_name);
                Image::make(sprintf($logoDirectoryPath . '%s', $image_name))->resize(200, 200)->save();

                DB::table('users')
                    ->where('id', $request->userId)
                    ->update(['profile_img' => $image_name]);

                return redirect()->back()->with('status', 'Profile updated!');
            }
        }
        return redirect()->action('Admin\AddNewUserController@showUsers');
    }



    public function editUser(Request $request){

        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2)) {

            $userInfo = DB::table('users')
                ->where('users.id', $request->id)
                ->first();

            $departments = DB::table('departments')
                ->join('departments_users', 'departments_users.department_id', '=', 'departments.id')
                ->where('departments_users.user_id', Auth::user()->id)
                ->get();

            $roles = DB::table('roles')->get();
            $status = DB::table('statuses')->get();


            return view('admin/edit/editUser', [
                'user_id' => $request->id,
                'user_name' => $userInfo->name,
                'user_email' => $userInfo->email,
                'departments' => $departments,
                'roles' => $roles,
                'status' => $status,
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
