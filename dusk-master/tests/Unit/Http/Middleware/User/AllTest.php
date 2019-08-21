<?php

namespace Tests\Unit\Http\Middleware\User;

use Illuminate\Support\Collection;
use App\Http\Middleware\User\All;
use Tests\Unit\Http\Middleware\TestCase;
use App\Data\Repository\UserInterface;

class AllTest extends TestCase
{
    public function testInvoke()
    {
        $repo = $this->mock(UserInterface::class);

        $repo->shouldReceive('all')->once()->andReturn(new Collection);

        $m = new All($repo);

        $m($this->request(), $this->response(), function ($request, $response) {
            $this->assertInstanceOf(Collection::class, $request->getAttribute('collection'));
        });
    }
}
