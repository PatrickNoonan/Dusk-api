<?php

namespace Tests\Unit\Data\Command\User;

use App\Data\User;
use Dusk\Event\Dispatcher;
use App\Data\Command\User\Update;
use App\Data\Command\User\UpdateHandler;

class UpdateHandlerTest extends \Tests\TestCase
{
    public function testInvoke()
    {
        $event = $this->mock(Dispatcher::class);
        $model = $this->mock(User::class);

        $model->shouldReceive('edit')->once()->with([])->andReturn($model);
        $model->shouldReceive('save')->once();

        $event->shouldReceive('dispatchFor')->once()->with($model);

        $handler = new UpdateHandler;
        $handler->setEventDispatcher($event);

        $this->assertInstanceOf(User::class, $handler(new Update($model, [])));
    }
}