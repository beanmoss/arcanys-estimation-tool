<?php

namespace Arcanys\EstimationTool\Repositories\EloquentRepositories;

use App\Models\Task;
use Arcanys\EstimationTool\Repositories\RepositoryInterface;

class TaskRepository implements RepositoryInterface
{
    use EloquentRepositoryTrait;

    protected $model;

    public function __construct(Task $m)
    {
        $this->model = $m;
    }
}