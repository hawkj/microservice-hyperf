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
use Hyperf\ConfigCenter\Mode;

return [
    'enable' => (bool) env('CONFIG_CENTER_ENABLE', false),
    'driver' => env('CONFIG_CENTER_DRIVER', 'nacos'),
    'mode' => env('CONFIG_CENTER_MODE', Mode::PROCESS),
    'drivers' => [
        'nacos' => [
            'driver' => Hyperf\ConfigNacos\NacosDriver::class,
            'merge_mode' => Hyperf\ConfigNacos\Constants::CONFIG_MERGE_OVERWRITE,
            'interval' => 3,
            'default_key' => env('APP_NAME'),
            'listener_config' => [
                'nacos_config' => [
                    'tenant' => env('NACOS_NAMESPACE_ID'),
                    'data_id' => env('APP_NAME') . '_' . env('APP_ENV'),
                    'group' => 'DEFAULT_GROUP',
                    'type' => 'yaml'
                ],
            ],
            'client' => [
                'host' => env('NACOS_HOST'),
                'port' => env('NACOS_PORT'),
                'username' => env('NACOS_USERNAME'),
                'password' => env('NACOS_PASSWORD'),
                'guzzle' => [
                    'config' => null,
                ],
            ],
        ],
    ],
];
