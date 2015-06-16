<?php

namespace Arcanys\EstimationTool\Repositories\EloquentRepositories;


trait EloquentRepositoryTrait
{

    public function all($withRelationship = [])
    {
        $model = $this->model;

        return $model::all()->load($withRelationship);
    }

    public function paginate($itemsPerPage = 50, $withRelationship = [])
    {
        $model = $this->model;

        return $model::with($withRelationship)->paginate($itemsPerPage);
    }

    public function find($id = 0, $withRelationship = [])
    {
        $model = $this->model;

        return $model::with($withRelationship)->find($id);
    }

    public function findBy($where = [])
    {
        $model = $this->model;

        return $model::where($where);
    }

    public function create($data = [])
    {
        $model = $this->model;

        return $model::create($data);
    }

    public function update($id, $data = [])
    {
        $model = $this->model;

        return $model::find($id)->fill($data)->save();
    }

    public function delete($id)
    {
        $model = $this->model;

        return $model::destroy($id);
    }
} 