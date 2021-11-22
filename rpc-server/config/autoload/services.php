<?php
return [
    'drivers' => [
        'nacos' => [
            'host' => env('NACOS_HOST'),
            'port' => env('NACOS_PORT'),
            'username' => env('NACOS_USERNAME'),
            'password' => env('NACOS_PASSWORD'),
            'guzzle' => [
                'config' => null,
            ],
            'group_name' => env('DEFAULT_GROUP'),
            'namespace_id' => env('NACOS_NAMESPACE_ID'),
            'heartbeat' => 5,
        ],
    ],
];