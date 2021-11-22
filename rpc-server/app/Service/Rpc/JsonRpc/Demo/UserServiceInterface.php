<?php

namespace App\Service\Rpc\JsonRpc\Demo;


interface UserServiceInterface
{
    public function create(string $name, int $gender): array;
    public function getBySnowFlakeId(int $snowFlakeId): array;
}