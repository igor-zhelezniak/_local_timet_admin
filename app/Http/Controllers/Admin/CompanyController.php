<?php

namespace App\Http\Controllers\Admin;

use App\CompanyInfo;
use App\Http\Controllers\AuthorizationController;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;
use Request;
use Image;

class CompanyController extends AuthorizationController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showSettings(){
        if(Auth::user()->hasRole(1)) {

            return view('admin.settings');
        }
        return view('404');
    }

    public function updateCompany(Request $request){
        if(Auth::user()->hasRole(1)){
            $company = CompanyInfo::findOrFail(Auth::user()->company_id);

            if($company->validate(Request::all())) {

                $company->fill(Request::all());
                $company->save();

                if(Request::file('companyLogo')){
                    $this->uploadLogo($request);
                }

                return redirect()->action('Admin\AddNewUserController@profileInfo');
            }

            return Redirect::back()
                ->withErrors($company->errors())
                ->withInput(Input::all());
        }
    }

    public function uploadLogo(Request $request){

        if(Auth::user()->hasRole(1)) {
            $logoDirectoryPath = 'uploads/company/logo/' . Auth::user()->company_id . '/';
            $companyLogoName = 'company-logo.';

            $file = Request::file('companyLogo');
            $extension = Input::file('companyLogo')->getClientOriginalExtension();
            $image_name = $companyLogoName.$extension;

            $file->move($logoDirectoryPath, $image_name);
            $image = Image::make(sprintf($logoDirectoryPath . '%s', $image_name))->resize(200, 50)->save();


            DB::table('companies')
                ->where('id', Auth::user()->company_id)
                ->update(['companyLogo' => $image_name]);
        }
        return view('404');
    }
}
