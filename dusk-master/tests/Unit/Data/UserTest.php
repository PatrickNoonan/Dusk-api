<?php

namespace Tests\Unit\Data;

use App\Data\User;

class UserTest extends \Tests\TestCase
{
    public function testCreate()
    {
        $model = new User;

        $model->create([
            'username'       => 'test type',
            'email'          => 'test_key',
        ]);

        $this->assertInstanceOf(\App\Data\Event\User\Created::class, $model->release()[0]);
        $this->assertEquals('test-type', $model->leadType);
        $this->assertEquals('test_key', $model->triggerKey);
    }

    public function testEdit()
    {
        $model = new User;

        $model->edit([
            'username'       => 'test type',
            'email'          => 'test_key',
        ]);

        $this->assertInstanceOf(\App\Data\Event\User\Updated::class, $model->release()[0]);
        $this->assertEquals('test-type', $model->username);
        $this->assertEquals('test_key', $model->email);
    }

    public function testDelete()
    {
        $model = new User;

        $model->delete();

        $this->assertInstanceOf(\App\Data\Event\User\Deleted::class, $model->release()[0]);
    }
}