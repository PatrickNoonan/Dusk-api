<?php


namespace App\Http\Middleware\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class FindById extends Base
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $request = $request->withAttribute('model', $this->repo->find($request->getAttribute('route')->getArgument('id')));

        return $next($request, $response);
    }
}