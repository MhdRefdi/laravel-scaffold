<?php

namespace App\Repositories;

interface EloquentRepositoryInterface
{

    /**
     * Get the name of the model.
     *
     * @return string The name of the model.
     */
    public function getModelName();


    /**
     * Retrieve all records from the database.
     *
     * @param array  Additional parameters for the query (optional).
     * @return array An array of all records retrieved from the database.
     */
    public function all(array $params  = []);


    /**
     * Store a new record in the database.
     *
     * @param array  The attributes of the record to be stored.
     * @return bool True if the record was successfully stored, false otherwise.
     */
    public function store(array $attributes);


    /**
     * Find a record by its ID in the database.
     *
     * @param string  The ID of the record to be found.
     * @return mixed|null The found record, or null if not found.
     */
    public function find(string $id);


    /**
     * Update a record in the database by its ID.
     *
     * @param string  The ID of the record to be updated.
     * @param array  The attributes to be updated.
     * @return bool True if the record was successfully updated, false otherwise.
     */
    public function update(string $id, array $attributes);


    /**
     * Delete a record from the database by its ID.
     *
     * @param string  The ID of the record to be deleted.
     * @return bool True if the record was successfully deleted, false otherwise.
     */
    public function delete(string $id);
}
