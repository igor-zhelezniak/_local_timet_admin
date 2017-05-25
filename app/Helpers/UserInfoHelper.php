<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 21.05.2017
 * Time: 23:08
 */

namespace App\Helpers;

use Illuminate\Support\Facades\DB;


class UserInfoHelper
{

    public static function getUserInfo($userId){

        $userInfo = '';

        if(!empty($userId)){
            $userInfo = DB::table('users')
                ->where('id', $userId)
                ->get();
        }

        return $userInfo;
    }

    public static function getUserName($userId){

        $userName = 'N/A';

        if(!empty($userId)){
            $userName = DB::table('users')
                ->select('name')
                ->where('id', $userId)
                ->first();
        }

        if(!empty($userName->name)){
            return $userName->name;
        }

        return '';
    }

    public static function getUserDepartment($userId){

        if(!empty($userId)){
            $userDepartment = DB::table('users')
                ->select('departments.department_name')
                ->join('users_departments', 'users_departments.user_id', '=', 'users.id')
                ->join('departments', 'departments.id', '=', 'users_departments.department_id')
                ->where('users.id', $userId)
                ->first();
        }

        if(!empty($userDepartment->department_name)){
            return $userDepartment->department_name;
        }
        return 'N/A';
    }

    public static function getUserProfilePhoto($userId){

        if(!empty($userId)){
            $userProfilePhoto = DB::table('users')
                ->select('profile_img')
                ->where('id', $userId)
                ->first();
        }

        if(!empty($userProfilePhoto->profile_img)){

            return $userProfilePhoto->profile_img;
        }

        return '';
    }
}
