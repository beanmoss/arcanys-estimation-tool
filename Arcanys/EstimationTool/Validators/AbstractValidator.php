<?php

namespace Arcanys\EstimationTool\Validators;


abstract class AbstractValidator
{
    protected $rules;

    protected $validator;

    public function getRules()
    {
        return $this->rules;
    }

    public function setRules($rules = [])
    {
        return $this->rules = $rules;
    }
} 