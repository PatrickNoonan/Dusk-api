<?php

namespace Tests\Unit\Data\Listener;

use App\Data\Failure;
use App\Data\Listener\LogFailedApiRequests;
use App\Data\Service\SFMC\Event\RequestFailed;

class LogFailedApiRequestsTest extends \Tests\TestCase
{
    public function testHandle()
    {
        $model = $this->mock(Failure::class);

        $model->shouldReceive('create')->once()->with('test', [])->andReturn($model);
        $model->shouldReceive('save')->once();

        $listener = new LogFailedApiRequests($model);

        $listener->handle(new RequestFailed('test', []));
    }
}