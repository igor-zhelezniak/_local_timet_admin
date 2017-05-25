<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AuthorizationController;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

    public function uploadLogo(){

        if(Auth::user()->hasRole(1)) {
            $logoDirectoryPath = 'uploads/company/logo/' . Auth::user()->company_id . '/';
            $companyLogoName = 'company-logo.';

            $file = Request::file('userFile');
            $extension = Input::file('userFile')->getClientOriginalExtension();
            //$image_name = time()."-".$file->getClientOriginalName();
            $image_name = $companyLogoName.$extension;

            $file->move($logoDirectoryPath, $image_name);
            $image = Image::make(sprintf($logoDirectoryPath . '%s', $image_name))->resize(200, 50)->save();

            DB::table('companies')
                ->where('id', Auth::user()->company_id)
                ->update(['companyLogo' => $image_name]);

            return redirect()->action('Admin\CompanyController@showSettings');
        }
        return view('404');
    }
}
