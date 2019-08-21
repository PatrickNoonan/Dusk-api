<?php

namespace App\Http\Action\User;

use App\Http\Action\Action;
use Dusk\Bus\Dispatcher;
use App\Data\Command\User\Delete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DeleteAction extends Action
{
    /**
     * @var Dispatcher
     */
    protected $bus;

    /**
     * DeleteAction constructor.
     * @param Dispatcher $bus
     */
    public function __construct(Dispatcher $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->bus->dispatch(new Delete($request->getAttribute('model')));

        return $response->withStatus(204)->withBody($this->streamJson([]));
    }
}