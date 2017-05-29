<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CompanyInfo extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name', 'code', 'url','description', 'country', 'city', 'adress', 'timezone', 'phone_number', 'companyLogo', 'nominal'
    ];

    protected $rules = [
        'country' => 'required',
        'city' => 'required',
        'timezone' => 'required',
        'adress' => 'required',
        'phone_number' => 'required'
    ];

    private $errors;


    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);

        if ($v->fails())
        {
            $this->errors = $v->messages();
            return false;
        }

        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

}
