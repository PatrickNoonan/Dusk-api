<?php

namespace App\Http\Middleware;

use Dusk\Http\AbstractMiddleware;
use Dusk\Exception\NotFoundException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ModelNotFound extends AbstractMiddleware
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        if (is_null($request->getAttribute('model'))) {
            throw new NotFoundException('The requested resource was not found.');
        }

        return $next($request, $response);
    }

}