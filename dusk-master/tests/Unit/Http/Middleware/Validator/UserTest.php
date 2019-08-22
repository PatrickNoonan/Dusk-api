<?php
//
//namespace Tests\Unit\Http\Middleware\Validator;
//
//use Slim\Route;
//use Illuminate\Validation\Factory;
//use Psr\Http\Message\ServerRequestInterface;
//use App\Http\Middleware\Validator\User;
//
//class UserTest extends \Tests\TestCase
//{
//    public function testPostRequest()
//    {
//        $request = $this->mock(ServerRequestInterface::class);
//
//        $request->shouldReceive('getMethod')->once()->andReturn('POST');
//
//        $v = new User($this->mock(Factory::class));
//
//        $this->assertEquals([
//            'username'     => 'required',
//            'email'        => 'required'
//        ], $v->rules($request));
//    }
//
//    public function testPutRequest()
//    {
//        $route   = $this->mock(Route::class);
//        $request = $this->mock(ServerRequestInterface::class);
//
//        $request->shouldReceive('getMethod')->once()->andReturn('PUT');
//        $request->shouldReceive('getAttribute')->once()->with('route')->andReturn($route);
//
//        $route->shouldReceive('getArgument')->once()->with('id')->andReturn('1');
//
//        $v = new User($this->mock(Factory::class));
//
//        $this->assertEquals([
//            'username'     => 'filled',
//            'email'        => 'filled'
//        ], $v->rules($request));
//    }
//
//    public function testPatchRequest()
//    {
//        $route   = $this->mock(Route::class);
//        $request = $this->mock(ServerRequestInterface::class);
//
//        $request->shouldReceive('getMethod')->once()->andReturn('PATCH');
//        $request->shouldReceive('getAttribute')->once()->with('route')->andReturn($route);
//
//        $route->shouldReceive('getArgument')->once()->with('id')->andReturn('1');
//
//        $v = new User($this->mock(Factory::class));
//
//        $this->assertEquals([
//            'username'     => 'filled',
//            'email'        => 'filled'
//        ], $v->rules($request));
//    }
//}
