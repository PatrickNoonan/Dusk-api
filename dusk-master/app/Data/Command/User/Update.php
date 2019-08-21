<?php

namespace App\Data\Command\User;

use App\Data\User;

class Update
{
    public $model;

    /**
     * @var array
     */
    public $data;

    public function __construct(User $model, array $data)
    {
        $this->model = $model;
        $this->data  = $data;
    }
}