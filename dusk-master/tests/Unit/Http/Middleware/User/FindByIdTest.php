<?php

namespace Tests\Unit\Http\Middleware\User;

use App\Data\User;
use Slim\Interfaces\RouteInterface;
use Tests\Unit\Http\Middleware\TestCase;
use App\Data\Repository\UserInterface;
use App\Http\Middleware\User\FindById;

class FindByIdTest extends TestCase
{
    public function testHandle()
    {
        $repo    = $this->mock(UserInterface::class);
        $route   = $this->mock(RouteInterface::class);
        $request = $this->request()->withAttribute('route', $route);

        $route->shouldReceive('getArgument')->once()->with('id')->andReturn('1');

        $repo->shouldReceive('find')->once()->with('1')->andReturn($this->mock(User::class));

        $m = new FindById($repo);

        $m($request, $this->response(), function ($request, $response) {
            $this->assertInstanceOf(User::class, $request->getAttribute('model'));
        });
    }
}