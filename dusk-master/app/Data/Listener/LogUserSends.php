<?php

namespace App\Data\Listener;

use Psr\Log\LoggerInterface;
use App\Data\Event\User\Sent;

class LogUserSends
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $log;

    /**
     * @param \Psr\Log\LoggerInterface $log
     */
    public function __construct(LoggerInterface $log)
    {
        $this->log = $log;
    }

    /**
     * Handle the command
     *
     * @param \App\Data\Event\User\Sent $event
     *
     * @return void
     */
    public function handle(Sent $event)
    {
        $this->log->info('[Lead Source] Email Sent', $event->data);
    }
}