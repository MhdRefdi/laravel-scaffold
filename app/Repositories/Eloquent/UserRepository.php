<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UserRepository extends BaseRepository
{
     protected $model;

    /**
     * Creates a new instance of the class.
     *
     * @param User $model The User model.
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
