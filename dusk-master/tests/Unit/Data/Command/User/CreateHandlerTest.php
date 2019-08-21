<?php

namespace Tests\Unit\Data\Command\User;

use App\Data\User;
use Dusk\Event\Dispatcher;
use App\Data\Command\User\Create;
use App\Data\Command\User\CreateHandler;

class CreateHandlerTest extends \Tests\TestCase
{
    public function testInvoke()
    {
        $event = $this->mock(Dispatcher::class);
        $model = $this->mock(User::class);

        $model->shouldReceive('create')->once()->with([])->andReturn($model);
        $model->shouldReceive('save')->once();

        $event->shouldReceive('dispatchFor')->once()->with($model);

        $handler = new CreateHandler($model);
        $handler->setEventDispatcher($event);

        $this->assertInstanceOf(User::class, $handler(new Create([])));
    }
}