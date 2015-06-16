<?php namespace App\Http\Controllers;

use Arcanys\EstimationTool\Repositories\EloquentRepositories\AdditionalTimeRequirementRepository;
use Arcanys\EstimationTool\Validators\AdditionalTimeRequirementValidator;
use Laravel\Lumen\Routing\Controller as BaseController;

class AdditionalTimeRequirementController extends BaseController
{
    use RestControllerTrait;

    public function __construct(AdditionalTimeRequirementRepository $repository, AdditionalTimeRequirementValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    protected function beforeUpdate($data)
    {
        // nothing to do here
    }
}