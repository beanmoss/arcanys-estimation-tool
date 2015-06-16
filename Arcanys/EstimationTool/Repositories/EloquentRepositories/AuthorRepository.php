<?php

namespace Arcanys\EstimationTool\Repositories\EloquentRepositories;

use App\Models\Author;
use Arcanys\EstimationTool\Repositories\RepositoryInterface;

class AuthorRepository implements RepositoryInterface
{
    use EloquentRepositoryTrait;

    protected $model;

    public function __construct(Author $m)
    {
        $this->model = $m;
    }
}