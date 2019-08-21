<?php

date_default_timezone_set('America/Chicago');

return [

    'env'          => env('APP_ENV', 'production'),
    'debug'        => env('APP_DEBUG', false),
    'base_path'    => realpath(__DIR__ . '/../'),

    'database'  => [
        'default' => env('DB_CONNECTION', 'default'),

        'connections' => [

            'default' => [
                'driver'    => env('DB_DRIVER', 'mysql'),
                'host'      => env('DB_HOST', 'localhost'),
                'port'      => env('DB_PORT', 3306),
                'database'  => env('DB_DATABASE', 'forge'),
                'username'  => env('DB_USERNAME', 'forge'),
                'password'  => env('DB_PASSWORD', ''),
                'charset'   => env('DB_CHARSET', 'utf8'),
                'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
                'prefix'    => env('DB_PREFIX', ''),
                'timezone'  => env('DB_TIMEZONE', '+00:00'),
                'strict'    => env('DB_STRICT_MODE', false),
            ]

        ],

        'migrations' => [
            'table' => 'migrations',
            'path'  => realpath(__DIR__ . '/../database/migrations')
        ]
    ],

    'redis' => [
        'host'     => env('REDIS_HOST', '127.0.0.1'),
        'password' => env('REDIS_PASSWORD'),
        'port'     => env('REDIS_PORT', '6379'),
        'database' => env('REDIS_DB', 0)
    ],

    'cache' => [

        /** The default cache pool **/
        'default' => env('CACHE_POOL_DEFAULT', 'default'),

        /** Cache pools are isolated repositories within a given cache. **/
        'pools' => [

            'default' => [
                'driver'    => 'redis',
                'namespace' => 'app.cache'
            ],

            'jwt_blacklist' => [
                'driver'    => 'redis',
                'namespace' => 'jwt.blacklist'
            ]

        ]
    ],

    'jwt' => [
        'issuer'         => env('APP_URL', 'http://localhost'),
        'secret'         => env('JWT_SECRET', 'someRandomKey'),
        'algorithm'      => 'HS256',
        'blacklist_pool' => 'jwt_blacklist'
    ],

    'access_token' => [
        'secret'    => env('ACCESS_TOKEN_SECRET', 'someRandomKey'),
        'algorithm' => 'HS256'
    ],

    'log' => [
        'handler' => env('APP_LOG', 'file'),
        'level'   => 'debug',

        'file' => [
            'path'  => realpath(__DIR__ . '/../var/log'),
        ],

        'syslog' => [
            'identity' => 'microservice'
        ],

        'udp'    => [
            'identity' => 'microservice',
            'host'     => 'logs4.papertrailapp.com',
            'port'     => 50897
        ]
    ],

    'queue' => [

        'default' => env('QUEUE_DEFAULT', 'sync'),

        'queues' => [

            'sync' => [
                'driver' => 'sync'
            ],

            'mock' => [
                'driver' => 'mock'
            ],

            'default' => [
                'driver'      => 'redis',
                'tube'        => 'default',
                'retry_after' => 60
            ]

        ],

        'failed' => [
            'database' => env('DB_CONNECTION', 'default'),
            'table'    => 'failed_jobs'
        ]

    ],

    /** Default settings required by slim DO NOT REMOVE **/
    'httpVersion'                       => '1.1',
    'responseChunkSize'                 => 4096,
    'outputBuffering'                   => 'append',
    'determineRouteBeforeAppMiddleware' => true,
    'addContentLengthHeader'            => true,
    'routerCacheFile'                   => false,

];