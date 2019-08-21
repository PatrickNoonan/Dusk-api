<?php


namespace App\Data;


use App\Data\Event\User\Created;
use App\Data\Event\User\Deleted;
use App\Data\Event\User\Updated;
use Dusk\Database\Model;
use Dusk\Foundation\Traits\GeneratesUuid;

class User extends Model
{
    use GeneratesUuid;
    protected $table ='user';

    public function create(array $data)
    {
        $this->guid = $this->uuid1();
        $this->username = $data['username'];
        $this->email = $data['email'];

        $this->raise(new Created($this));

        return $this;
    }
    public function delete()
    {
        parent::delete();

        $this->raise(new Deleted($this));

        return $this;
    }
    public function edit(array $data)
    {
        //$this->username       = $data['username'] ?? $this->username;
        $this->email     = $data['email'] ?? $this->email;

        $this->raise(new Updated($this));

        return $this;
    }
}