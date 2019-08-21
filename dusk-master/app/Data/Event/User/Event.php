<?php

namespace App\Data\Event\User;

use App\Data\User;

class Event
{
    /**
     * @var User
     */
    public $model;

    /**
     * Event constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}