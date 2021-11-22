<?php

namespace App\Service\JsonRpc;


interface UserServiceInterface
{
    public function create(string $name, int $gender): array;
    public function getBySnowFlakeId(int $snowFlakeId): array;
}