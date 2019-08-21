<?php

namespace Tests\Unit\Http\Middleware;

use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Response;
use Dusk\Http\StreamTrait;
use Slim\Http\Environment;

class TestCase extends \Tests\TestCase
{
    use StreamTrait;

    /**
     * Create a new request object
     *
     * @param \Slim\Http\Environment|null $environment
     *
     * @return \Slim\Http\Request
     */
    protected function request(Environment $environment = null)
    {
        return Request::createFromEnvironment($environment ?: Environment::mock());
    }

    /**
     * Create a new response object
     *
     * @param int   $status
     * @param array $body
     * @param array $headers
     *
     * @return \Slim\Http\Response
     */
    protected function response($status = 200, array $body = [], array $headers = [])
    {
        return new Response($status, new Headers($headers), $this->streamJson($body));
    }
}