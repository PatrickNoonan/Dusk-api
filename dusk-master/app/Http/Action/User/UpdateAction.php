<?php

namespace App\Http\Action\User;

use Dusk\Bus\Dispatcher;
use App\Data\Command\User\Update;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UpdateAction extends Action
{

    protected $bus;

    public function __construct(Dispatcher $bus)
    {
        $this->bus  = $bus;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $data   = $this->bus->dispatch(new Update($request->getAttribute('model'), $request->getParsedBody() ?: []));

        $stream = $this->streamItem($data, $request->getAttribute('serializer'));

        return $response->withStatus(200)->withBody($stream);
    }
}