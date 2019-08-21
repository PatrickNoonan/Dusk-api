<?php

namespace Tests;

use Mockery;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Bootstrap the test environment
     *
     * @return void
     */
    protected function setUp()
    {
    }

    /**
     * Clean up the test environment
     *
     * @return void
     */
    protected function tearDown()
    {
        Mockery::close();
    }

    /**
     * Create a new mock object
     *
     * @return \Mockery\MockInterface
     */
    protected function mock()
    {
        return call_user_func_array([Mockery::getContainer(), 'mock'], func_get_args());
    }
}