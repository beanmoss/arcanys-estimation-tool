<?php

namespace Arcanys\EstimationTool\Validators;

use \Validator;

class TaskValidator extends AbstractValidator implements ValidatorInterface
{

    protected $rules = [
        'user_story_id' => 'required|integer',
        'description' => 'required|max:500',
        'fifty_estimate_hrs' => 'required|numeric',
        'ninety_estimate_hrs' => 'required|numeric',
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