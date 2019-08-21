<?php

namespace Tests\Unit\Data\Command\User;

use App\Data\User;
use Dusk\Event\Dispatcher;
use App\Data\Command\User\Delete;
use App\Data\Command\User\DeleteHandler;

class DeleteHandlerTest extends \Tests\TestCase
{
    public function testInvoke()
    {
        $model = $this->mock(User::class);
        $event = $this->mock(Dispatcher::class);

        $model->shouldReceive('delete')->once()->andReturn($model);

        $event->shouldReceive('dispatchFor')->once()->with($model);

        $handler = new DeleteHandler;
        $handler->setEventDispatcher($event);

        $handler(new Delete($model));
    }
}