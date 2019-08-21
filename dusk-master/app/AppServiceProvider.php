<?php

namespace App;

use App\Data\Provider\UserServiceProvider;
use Dusk\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Providers to register
     *
     * @var array
     */
    protected $providers = [
        EventServiceProvider::class,
        UserServiceProvider::class
    ];

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        foreach ($this->providers as $provider) {
            $this->container->register($provider);
        }
    }
}