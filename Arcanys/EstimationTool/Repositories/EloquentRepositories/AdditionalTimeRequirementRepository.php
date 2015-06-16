<?php

namespace Arcanys\EstimationTool\Repositories\EloquentRepositories;

use App\Models\AdditionalTimeRequirement;
use Arcanys\EstimationTool\Repositories\RepositoryInterface;

class AdditionalTimeRequirementRepository implements RepositoryInterface
{
    use EloquentRepositoryTrait;

    protected $model;

    public function __construct(AdditionalTimeRequirement $m)
    {
        $this->model = $m;
    }
}