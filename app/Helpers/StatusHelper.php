<?php

/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 11.05.2017
 * Time: 0:30
 */
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class StatusHelper
{
    public static function getClassName($data){

        switch ($data){
            case "Not approved" :
                return 'label-warning';
                break;

            case "Pending" :
                return 'label-warning';
                break;

            case "In progress" :
                return 'label-warning';
                break;

            case "Rejected" :
                return 'label-danger';
                break;

            case "Approved" :
                return 'label-success';
                break;
        }

    }

    public static function getLogoImage($companyId){

       $image = DB::table('companies')
            ->select('companyLogo')
            ->where('id', $companyId)
            ->first();

        return $image->companyLogo;
    }

    public static function getCompanyName($companyId){
        $company = DB::table('companies')
            ->select('name')
            ->where('id', $companyId)
            ->first();

        return $company->name;
    }

    /*Navigation*/
    public static function isActiveMenuItem($path){
        return request()->path() == $path;
    }

}