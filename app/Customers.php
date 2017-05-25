<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Customers extends Model
{
    protected $table = 'clients';
    protected $fillable = ['id', 'name', 'code', 'status'];
    public $timestamps = false;

    protected $rules = [
        'name' => 'required',
        'code' => 'required',
        'status' => 'required'
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