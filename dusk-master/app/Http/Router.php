<?php

namespace App\Http;

use App\Http\Action\User\AllAction;
use Slim\App;

class Router
{
    /**
     * Register middleware to run on every request
     *
     * @param \Slim\App $app
     * @return void
     */
    public static function middleware(App $app)
    {
        $app->add(\Dusk\Http\Middleware\ExceptionHandler::class);
        $app->add(\Dusk\Debug\DebugMiddleware::class);
        $app->add(\Dusk\Http\Middleware\ValidateContentType::class);
        $app->add(\Dusk\Http\Middleware\Https::class);
    }

    /**
     * Register application routes
     *
     * @param \Slim\App $app
     * @return void
     */
    public static function register(App $app)
    {
        $app->post('/user', Action\User\CreateAction::class);

        $app->get('/user',AllAction::class);

        $app->delete('/user/{id}', Action\User\DeleteAction::class)
            ->add(Middleware\ModelNotFound::class)
            ->add(Middleware\User\FindById::class);

        $app->patch('/user/{id}', Action\User\UpdateAction::class)
            ->add(Middleware\ModelNotFound::class)
            ->add(Middleware\User\FindById::class)
            ->add(Middleware\Validator\User::class);
    }
}