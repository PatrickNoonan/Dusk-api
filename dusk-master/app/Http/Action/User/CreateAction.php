<?php


namespace App\Http\Action\User;


use App\Data\Command\User\Create;
use Dusk\Bus\Dispatcher;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreateAction
{
    protected $bus;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->bus = $dispatcher;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        //dd($request->getParsedBody());

        $this->bus->dispatch(new Create($request->getParsedBody()));
    }
}