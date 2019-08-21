<?php


namespace App\Data\Provider;


use App\Data\Repository\Eloquent\UserRepository;
use App\Data\Repository\UserInterface;
use Dusk\ServiceProvider;
use App\Data\User;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->container->bind(UserInterface::class, function () {
            return new UserRepository(new User);
        });
    }

}