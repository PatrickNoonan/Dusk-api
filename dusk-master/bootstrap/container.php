<?php

$container = new Dusk\Container;

$container->register(new Dusk\DefaultServices($container, require __DIR__ . '/settings.php'));
$container->register(Dusk\Event\EventServiceProvider::class);
$container->register(Dusk\Database\DatabaseServiceProvider::class);
$container->register(Dusk\Foundation\PaginationServiceProvider::class);
$container->register(Dusk\Foundation\RedisServiceProvider::class);
$container->register(Dusk\Cache\CacheServiceProvider::class);
$container->register(Dusk\Queue\QueueServiceProvider::class);
$container->register(Dusk\Validation\ValidationServiceProvider::class);
$container->register(Dusk\Bus\BusServiceProvider::class);
$container->register(Dusk\JWT\JWTServiceProvider::class);
$container->register(Dusk\Debug\DebugServiceProvider::class);
$container->register(App\AppServiceProvider::class);

return $container;