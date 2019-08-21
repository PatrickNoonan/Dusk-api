<?php

$container = require __DIR__ . '/container.php';

$app = $container->get('app');

App\Http\Router::middleware($app);

App\Http\Router::register($app);

$container->boot();

return $app;