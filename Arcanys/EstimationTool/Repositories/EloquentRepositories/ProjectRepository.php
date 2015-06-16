<?php

namespace Arcanys\EstimationTool\Repositories\EloquentRepositories;

use App\Models\Project;
use Arcanys\EstimationTool\Repositories\RepositoryInterface;

class ProjectRepository implements RepositoryInterface
{
    use EloquentRepositoryTrait;

    protected $model;

    public function __construct(Project $m)
    {
        $this->model = $m;
    }
}