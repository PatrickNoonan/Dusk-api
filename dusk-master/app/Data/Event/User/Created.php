<?php


namespace App\Data\Event\User;

use App\Data\User;

class Created
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}