<?php

namespace App\Service\Rpc\JsonRpc\Demo;



interface TestServiceInterface
{
    public function demoWithCoruntine(): array;

    public function demoWithOutCoruntine(): array;

    public function test(): string;
}