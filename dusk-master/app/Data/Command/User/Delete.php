<?php

namespace App\Data\Command\User;

use App\Data\User;

class Delete
{
    /**
     * @var User
     */
    public $model;

    /**
     * Delete constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}