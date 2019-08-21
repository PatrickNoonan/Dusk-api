<?php

namespace App;

use App\Data\Event\User\Created;
use App\Data\Listener\User\Created\SendEmail;
use Dusk\ServiceProvider;
use Dusk\Event\Dispatcher;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Created::class => [
            SendEmail::class

        ]
    ];
    /**
     * {@inheritdoc}
     */
    public function boot(Dispatcher $dispatcher)
    {

        foreach ($this->listen as $event => $listeners) {
            foreach ($listeners as $listener) {
                $dispatcher->listen($event, $listener);
            }
        }

    }
}