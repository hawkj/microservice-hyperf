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


return [
    App\Service\JsonRpc\UserServiceInterface::class => App\Service\JsonRpc\UserService::class,
    App\Service\JsonRpc\TestServiceInterface::class => App\Service\JsonRpc\TestService::class
];
