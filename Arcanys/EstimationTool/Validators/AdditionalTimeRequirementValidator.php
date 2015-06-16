<?php

namespace Arcanys\EstimationTool\Validators;

use \Validator;

class AdditionalTimeRequirementValidator extends AbstractValidator implements ValidatorInterface
{

    protected $rules = [
        'project_id' => 'required|integer',
        'category' => 'required|max:100',
        'description' => 'required|max:500',
        'hours' => 'required|numeric',
        'timing' => 'required|in:SPRINT,DAY,WEEK,ONCE'
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