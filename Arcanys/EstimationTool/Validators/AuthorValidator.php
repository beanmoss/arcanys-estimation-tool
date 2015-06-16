<?php

namespace Arcanys\EstimationTool\Validators;

use \Validator;

class AuthorValidator extends AbstractValidator implements ValidatorInterface
{

    protected $rules = [
        'name' => 'required|max:100',
        'project_id' => 'required|integer',
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