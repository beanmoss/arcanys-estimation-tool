<?php

namespace App\Http\Controllers;

use Arcanys\EstimationTool\Repositories\EloquentRepositories\ProjectRepository;
use Arcanys\EstimationTool\Validators\ProjectValidator;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProjectController extends BaseController
{
    use RestControllerTrait;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    protected function beforeUpdate($data)
    {
        // nothing to do here
    }
}