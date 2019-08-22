<?php

namespace Tests\Unit\Data;

use App\Data\User;

class UserTest extends \Tests\TestCase
{
    public function testCreate()
    {
        $model = new User;

        $model->create([
            //"guid"           => $this->uuid1(),
            'username'       => 'TestName',
            'email'          => 'test_key@test.com',
        ]);

        //$this->assertInstanceOf(\App\Data\Event\User\Created::class, $model->release()[0]);
        $this->assertEquals('TestName', $model->username);
        $this->assertEquals('test_key@test.com', $model->email);
    }

    public function testEdit()
    {
        $model = new User;

        $model->edit([
            'username'       => 'TestName',
            'email'          => 'test_key@test.com',
        ]);

        //$this->assertInstanceOf(\App\Data\Event\User\Updated::class, $model->release()[0]);
        $this->assertEquals('TestName', $model->username);
        $this->assertEquals('test_key@test.com', $model->email);
    }

    public function testDelete()
    {
        $model = new User;

        $model->delete();

        $this->assertInstanceOf(\App\Data\Event\User\Deleted::class, $model->release()[0]);
    }
}