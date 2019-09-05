<?php


namespace App\Http\Middleware\User;

use Dusk\Http\AbstractMiddleware;
use App\Data\Repository\UserInterface;

abstract class Base extends AbstractMiddleware
{
    /**
     * @var \App\Data\Repository\LeadSourceInterface|UserInterface
     */
    protected $repo;

    /**
     * Base constructor.
     * @param UserInterface $repo
     */
    public function __construct(UserInterface $repo)
    {
        $this->repo = $repo;
    }
}