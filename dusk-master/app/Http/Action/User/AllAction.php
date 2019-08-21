<?php


namespace App\Http\Action\User;


use App\Data\Repository\UserInterface;
use App\Data\Serializer\UserSerializer;
use App\Http\Action\Action;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AllAction extends Action
{
    protected $repo;

    public function __construct(UserInterface $repo)
    {
        $this->repo = $repo;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $thisAll = $this->repo->all();

        $stream = $this->streamCollection($thisAll, UserSerializer::class);

        return $response->withStatus(200)->withBody($stream);

    }
}