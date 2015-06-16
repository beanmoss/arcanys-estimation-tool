<?php namespace App\Http\Controllers;

use Arcanys\EstimationTool\Repositories\EloquentRepositories\UserStoryRepository;
use Arcanys\EstimationTool\Validators\UserStoryValidator;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserStoryController extends BaseController
{
    use RestControllerTrait;

    public function __construct(UserStoryRepository $repository, UserStoryValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    protected function beforeUpdate($data)
    {
        // nothing to do here
    }
}