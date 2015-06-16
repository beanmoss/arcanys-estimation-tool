<?php namespace App\Http\Controllers;

use Arcanys\EstimationTool\Repositories\EloquentRepositories\AuthorRepository;
use Arcanys\EstimationTool\Validators\AuthorValidator;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthorController extends BaseController
{
    use RestControllerTrait;

    public function __construct(AuthorRepository $repository, AuthorValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    protected function beforeUpdate($data)
    {
        // nothing to do here
    }
}