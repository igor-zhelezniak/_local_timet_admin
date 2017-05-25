<?php

namespace App\Http\Controllers\Auth;

use App\CompanyInfo;
use App\User;
use App\UsersCompany;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

       // $this->getCountriesList();
        //$this->getCityByCountry();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'company_name' => 'required'
        ]);
    }

    public function showRegistrationForm()
    {
        $timezones = DB::table('timezones')->pluck('timezone', 'id');
        return view('auth.register')
            ->with('countries', $this->getCountriesList())
            ->with('timezones', $timezones);
    }

    public function ajaxGetCity(Request $request){
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $copmany = CompanyInfo::create([
            'name' => $data['company_name'],
            'code' => '',
            'url' => '',
            'description' =>'',
            'country' => data['country'],
            'city' => data['city'],
            'adress' => data['adress'],
            'phone_number' => data['phone_number'],
            'timezone' => data['timezone'],
            'companyLogo' => data['companyLogo']
        ]);

        $users = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 1,
            'status' => 1,
            'company_id' => $copmany->id,
        ]);

        return $users;
    }
}
