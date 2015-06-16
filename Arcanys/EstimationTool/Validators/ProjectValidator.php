<?php

namespace Arcanys\EstimationTool\Validators;

use \Validator;

class ProjectValidator extends AbstractValidator implements ValidatorInterface
{

    protected $rules = [
        'name' => 'required|max:100',
        'description' => 'required|max:250',
        'developer_number' => 'required|integer',
        'sprint_length' => 'required|integer',
        'workload_team_size_addition_per_dev' => 'required|integer'
    ];


    public function validate($data = [])
    {
        $this->validator = Validator::make($data, $this->rules);
    }

    public function isValid()
    {
        return !$this->validator->fails();
    }

    public function getErrors()
    {
        return $this->validator->errors();
    }
}