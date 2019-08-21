<?php

namespace App\Data\Service\SFMC\Event;

class RequestFailed
{
    /**
     * @var string
     */
    public $action;

    /**
     * @var array
     */
    public $data;

    /**
     * @param string $action
     * @param array  $data
     */
    public function __construct($action, array $data)
    {
        $this->action = $action;
        $this->data   = $data;
    }
}