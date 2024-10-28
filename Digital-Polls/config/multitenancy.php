<?php

return [
    'enabled' => true,
    'database' => [
        'connection' => env('DB_CONNECTION', 'mysql'),
        'table_prefix' => null,
        'schema' => [
            'prefix' => null,
            'migrations' => [],
        ],
    ],
    'routes' => [
        'prefix' => null,
        'middleware' => [],
    ],
    'cache' => [
        'driver' => 'array',
        'prefix' => 'multitenant:',
    ],
];
