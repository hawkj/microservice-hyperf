<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
$consumerServices = [
    'UserService' => \App\Service\JsonRpc\UserServiceInterface::class,
    'TestService' => \App\Service\JsonRpc\TestServiceInterface::class
];
return [
    'enable' => [
        'discovery' => true,
        'register' => true,
    ],
    'providers' => [],
    'consumers' => value(function () use ($consumerServices) {
        $consumers = [];
        foreach ($consumerServices as $name => $interface) {
            $consumers[] = [
                'name' => $name,
                'service' => $interface,
                'load_balancer' => 'round-robin',
                'registry' => [
                    'protocol' => 'nacos',
                    'address' => 'http://' . env('NACOS_HOST') . ':' . env('NACOS_PORT'),
                ],
            ];
        }
        return $consumers;
    }),
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
