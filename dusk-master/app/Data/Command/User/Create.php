<?php


namespace App\Data\Command\User;


class Create
{
    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}