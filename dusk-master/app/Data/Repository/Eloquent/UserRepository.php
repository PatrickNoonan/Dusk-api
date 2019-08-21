<?php


namespace App\Data\Repository\Eloquent;
use App\Data\User;

use App\Data\Repository\UserInterface;

class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->get();

    }

    public function find($id)
    {
        return $this->user->find($id);
    }

}