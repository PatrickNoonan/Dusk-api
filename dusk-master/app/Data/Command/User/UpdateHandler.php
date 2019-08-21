<?php

namespace App\Data\Command\User;

use Dusk\Bus\EventAwareHandler;

class UpdateHandler extends EventAwareHandler
{
    public function __invoke(Update $command)
    {
        $item = $command->model->edit($command->data);

        $item->save();

        $this->dispatchEventsFor($item);

        return $item;
    }
}