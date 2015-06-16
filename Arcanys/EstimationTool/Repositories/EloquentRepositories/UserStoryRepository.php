<?php

namespace Arcanys\EstimationTool\Repositories\EloquentRepositories;

use App\Models\UserStory;
use Arcanys\EstimationTool\Repositories\RepositoryInterface;

class UserStoryRepository implements RepositoryInterface
{
    use EloquentRepositoryTrait;

    protected $model;

    public function __construct(UserStory $m)
    {
        $this->model = $m;
    }
}