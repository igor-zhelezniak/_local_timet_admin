<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Departments extends Model
{
    protected $table = 'departments';
    public $timestamps = false;

    protected $rules = [
        'depCode' => 'required',
        'depName' => 'required'
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