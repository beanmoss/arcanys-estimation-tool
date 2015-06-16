<?php

namespace Arcanys\EstimationTool\Repositories;

interface RepositoryInterface
{

    /**
     * Retrieves all data from storage with relative data.
     *
     * @param array $withRelationship Data that are related with the main model.
     * @return mixed
     */
    public function all($withRelationship = []);

    /**
     * Retrieves all data with pagination from storage with relative data.
     *
     * @param int $itemsPerPage Number of items to be retrieved by page.
     * @param array $withRelationship Data that are related with the main model.
     * @return mixed
     */
    public function paginate($itemsPerPage = 50, $withRelationship = []);

    /**
     * Find a record from storage by id.
     *
     * @param int $id The id of the record.
     * @param array $withRelationship Data that are related with the main model.
     * @return mixed
     */
    public function find($id = 0, $withRelationship = []);

    /**
     * Find records by field.
     *
     * @param array $where the field and value to be retrieved.
     * @return mixed
     */
    public function findBy($where = []);

    /**
     * Saves data to the storage.
     *
     * @param array $data The data to be saved.
     * @return mixed
     */
    public function create($data = []);

    /**
     * Updates data from the storage by id.
     *
     * @param $id The id to be updated.
     *
     * @param array $data The new data.
     * @return mixed
     */
    public function update($id, $data = []);

    /**
     * Removes record from the storage.
     *
     * @param $id The id of the record to be removed.
     * @return mixed
     */
    public function delete($id);

} 