<?php

$container = require __DIR__ . '/container.php';

$container->register(Dusk\Foundation\FilesystemServiceProvider::class);
$container->register(Dusk\Database\MigrationsServiceProvider::class);
$container->register(Dusk\Cache\CacheConsoleServiceProvider::class);
$container->register(Dusk\Queue\QueueConsoleServiceProvider::class);
$container->register(App\Console\CommandRegister::class);

$container->boot();

return new Dusk\Console\Application($container);