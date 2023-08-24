<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Repositories\EloquentRepositoryInterface;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    /**
     * Constructor for the class.
     *
     * @param Model $model The model parameter.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Returns the model name.
     *
     * @param bool $snakeCase Whether to return the model name in snake case or not. Default is false.
     * @return string The model name. If $snakeCase is true, it will be returned in snake case.
     */

    public function getModelName($snake_case = false): String
    {
        $class_name = explode('\\', get_class($this->model));
        $class_name = $class_name[count($class_name) - 1];
        if (!$snake_case) return $class_name;

        return Str::snake($class_name, '-');
    }

    /**
     * Retrieves all data based on the given parameters.
     *
     * @param array $params An array of parameters to filter the data. Default is an empty array.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated data.
     */
    public function all(array $params = [])
    {
        $model = $this->model;
        $fillables = $this->model->getFillable();

        foreach ($fillables as $fillable) {
            if (isset($params[$fillable]) && !is_null($params[$fillable]) && !empty($params[$fillable]) && $fillable !== 'order') {
                $model->where($fillable, 'LIKE', '%' . $params[$fillable] . '%');
            }
        }

        if (isset($params['order']) && in_array($params['order'], $fillables)) {
            $model->orderBy(
                $params['order'],
                isset($params['ascending']) && $params['ascending'] == 0 ? 'DESC' : 'ASC'
            );
        } else {
            $model->orderBy('created_at', 'ASC');
        }

        return $model->paginate(isset($params['limit']) ? $params['limit'] : 1000);
    }

    /**
     * Find a record by ID.
     *
     * @param string $id The ID of the record to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *     If the record is not found.
     * @return mixed The found record.
     */
    public function find(string $id)
    {
        $data = $this->model->find($id);

        if (is_null($data)) throw new \Exception("Data tidak ditemukan.");

        return $data;
    }

    /**
     * Store the given attributes in the model and return the created data.
     *
     * @param array $attributes The attributes to be stored in the model.
     * @return mixed The created data.
     */
    public function store(array $attributes)
    {
        $fills = [];
        $model = $this->model;
        $fillables = $model->getFillable();

        foreach ($fillables as $fillable) {
            if (
                in_array(
                    $fillable,
                    $model->getImageFields()
                ) &&
                isset($attributes[$fillable]) &&
                !is_null($attributes[$fillable]) &&
                request()->hasFile($fillable)
            ) {

                $value = request()->file($fillable)->hashName();
                request()->file($fillable)->store("uploads/" . $this->getModelName(true));
                $fills[$fillable] = $value;
            } else {
                if (
                    $fillable !== 'id' &&
                    isset($attributes[$fillable]) &&
                    !is_null($attributes[$fillable]) &&
                    !empty($attributes[$fillable])
                ) {

                    if (in_array(
                        $fillable,
                        $model->getHashFields()
                    )) {

                        $fills[$fillable] = bcrypt($attributes[$fillable]);
                    } else {
                        $fills[$fillable] = $attributes[$fillable];
                    }
                }
            }
        }

        if (count($fills)) $data = $model->create($fills);

        return $data;
    }

    /**
     * Updates a record in the database based on the given ID.
     *
     * @param string $id The ID of the record to be updated.
     * @param array $attributes The attributes to be updated.
     * @throws \Exception If the record is not found.
     * @return \Illuminate\Database\Eloquent\Model The updated record.
     */
    public function update(string $id, array $attributes)
    {
        $fills = [];
        $data = $this->find($id);

        if (is_null($data)) throw new \Exception("Data tidak ditemukan.");

        $fillabels = $this->model->getFillable();

        foreach ($fillabels as $fillable) {
            if (in_array($fillable, $this->model->getImageFields()) &&
                isset($attributes[$fillable]) && !is_null($attributes[$fillable]) &&
                request()->hasFile($fillable)) {

                if (!is_null($data->{$fillable})) {
                    Storage::delete("uploads/" . $this->getModelName(true) . "/" . $data->{$fillable});
                }

                $value = request()->file($fillable)->hashName();
                request()->file($fillable)->store("uploads/" . $this->getModelName(true));

                $fills[$fillable] = $value;
            } else {
                if ($fillable !== 'id' &&
                    isset($attributes[$fillable]) &&
                    !is_null($attributes[$fillable]) &&
                    !empty($attributes[$fillable])) {
                    if (in_array(
                        $fillable,
                        $this->model->getHashFields()
                    )) {

                        $fills[$fillable] = bcrypt($attributes[$fillable]);
                    } else {
                        $fills[$fillable] = $attributes[$fillable];
                    }
                }
            }
        }

        if (count($fills)) $data->update($fills);

        return $data->refresh();
    }

    /**
     * Deletes a record from the database based on the given ID.
     *
     * @param string $id The ID of the record to be deleted.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the record with the given ID is not found.
     * @return bool True if the record is successfully deleted, false otherwise.
     */
    public function delete(string $id)
    {
        $data = $this->find($id);

        if (is_null($data)) throw new \Exception("Data tidak ditemukan.");

        $fillabels = $this->model->getFillable();

        foreach ($fillabels as $fillable) {
            if (in_array($fillable, $this->model->getImageFields()))
                if (!is_null($data->{$fillable}))
                    Storage::delete("uploads/" . $this->getModelName(true) . "/" . $data->{$fillable});
        }

        return $data->delete();
    }
}
