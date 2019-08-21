<?php

namespace App\Data\Listener;

use App\Data\Failure;
use App\Data\Service\SFMC\Event\RequestFailed;

class LogFailedApiRequests
{
    /**
     * @var \App\Data\Failure
     */
    protected $model;

    /**
     * @param \App\Data\Failure $model
     */
    public function __construct(Failure $model)
    {
        $this->model = $model;
    }

    /**
     * Handle the event
     *
     * @param \App\Data\Service\SFMC\Event\RequestFailed $event
     *
     * @return void
     */
    public function handle(RequestFailed $event)
    {
        $this->model->create($event->action, $event->data)->save();
    }
}