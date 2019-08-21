<?php

namespace App\Data\Command\User;

use Dusk\Bus\EventAwareHandler;

class DeleteHandler extends EventAwareHandler
{

    public function __invoke(Delete $command)
    {
        $model = $command->model->delete();

        $this->dispatchEventsFor($model);
    }
}