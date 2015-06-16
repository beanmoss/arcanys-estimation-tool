<?php namespace App\Http\Controllers;

use Arcanys\EstimationTool\Repositories\EloquentRepositories\TaskRepository;
use Arcanys\EstimationTool\Validators\TaskValidator;
use Laravel\Lumen\Routing\Controller as BaseController;

class TaskController extends BaseController
{
    use RestControllerTrait;

    public function __construct(TaskRepository $repository, TaskValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    protected function beforeUpdate($data)
    {
        // nothing to do here
    }
}