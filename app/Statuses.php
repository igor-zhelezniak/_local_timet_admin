<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Statuses extends Model
{
    protected $table = 'statuses';
    public $timestamps = false;

/*    protected $rules = [
        'categoryName' => 'required',
        'categoryCode' => 'required',
        'categoryDescr' => 'required'
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
    }*/

}