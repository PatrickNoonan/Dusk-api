<?php

namespace Tests\Unit\Http\Middleware;

use Dusk\Database\Model;
use Dusk\Exception\NotFoundException;
use App\Http\Middleware\ModelNotFound;

class ModelNotFoundTest extends TestCase
{
    public function testFound()
    {
        $request = $this->request()->withAttribute('model', $this->mock(Model::class));

        $m = new ModelNotFound;

        $m($request, $this->response(), function ($request, $response) {
            $this->assertInstanceOf(Model::class, $request->getAttribute('model'));
        });
    }

    public function testNotFound()
    {
        $m = new ModelNotFound;

        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('The requested resource was not found.');

        $m($this->request(), $this->response(), function ($request, $response) {});
    }
}