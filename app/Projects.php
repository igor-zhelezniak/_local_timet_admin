<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Projects extends Model
{
    protected $table = 'projects';
    protected $fillable = ['project_type', 'project_name', 'project_description', 'project_customer', 'project_budget_time', 'project_budget_money', 'project_lead', 'project_status'];
    public $timestamps = false;

    protected $rules = [
        'project_type' => 'required',
        'project_name' => 'required',
        'project_description' => 'required',
        'project_customer' => 'required|integer',
        'project_budget_time' => 'required|integer',
        'project_budget_money' => 'required|numeric',
        'project_lead' => 'required|integer'
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