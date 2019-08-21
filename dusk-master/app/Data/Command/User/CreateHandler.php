<?php


namespace App\Data\Command\User;


use App\Data\User;
use Dusk\Bus\EventAwareHandler;

class CreateHandler extends EventAwareHandler
{
    /**
     * @var User
     */
    protected $model;

    /**
     * CreateHandler constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param Create $command
     * @return User
     */
    public function __invoke(Create $command)
    {
        $item = $this->model->create($command->data);

        $item->save();

        $this->dispatchEventsFor($item);

        return $item;
    }
}