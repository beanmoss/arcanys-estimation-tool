<?php

namespace Arcanys\EstimationTool\Validators;

interface ValidatorInterface
{

    /**
     * Retrieves validation rules.
     *
     * @return mixed
     */
    public function getRules();

    /**
     * Add/Update the validation rules.
     *
     * @param array $rules New rules.
     * @return mixed
     */
    public function setRules($rules = []);

    /**
     * Validates data by the validation rules.
     *
     * @param array $data The data to be validated.
     * @return mixed
     */
    public function validate($data = []);

    /**
     * Checks whether the data is valid or not.
     *
     * @return bool
     */
    public function isValid();

    /**
     * Retrieves error messages if there are any.
     *
     * @return mixed
     */
    public function getErrors();

}