<?php


namespace App\Data\Listener\User\Created;


use App\Data\Event\User\Created;

class SendEmail
{
    public function handle(Created $event)
    {
        dd($event);
    }

}