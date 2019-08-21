<?php


namespace App\Data\Repository;


interface UserInterface
{
    public function all();
    public function find($id);

}