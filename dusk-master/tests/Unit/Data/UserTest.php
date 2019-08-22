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
            'username'       => 'TestKey',
            'email'          => 'test_key@test.com',
        ]);

        //$this->assertInstanceOf(\App\Data\Event\User\Created::class, $model->release()[0]);
        $this->assertEquals('TestKey', $model->username);
        $this->assertEquals('test_key@test.com', $model->email);
    }

    public function testEdit()
    {
        $model = new User;

        $model->create([
            'username'       => 'TestKey',
            'email'          => 'test_key@test.com',
        ]);

        $model->edit([
            'username'       => 'TestKey',
            'email'          => 'test_keyEdited@test.com',
        ]);

        //$this->assertInstanceOf(\App\Data\Event\User\Updated::class, $model->release()[0]);
        $this->assertEquals('TestKey', $model->username);
        $this->assertEquals('test_keyEdited@test.com', $model->email);
    }

    public function testDelete()
    {
        $model = new User;

        $model->delete();

        $this->assertInstanceOf(\App\Data\Event\User\Deleted::class, $model->release()[0]);
    }
}