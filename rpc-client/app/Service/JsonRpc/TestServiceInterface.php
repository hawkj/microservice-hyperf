<?php

namespace App\Service\JsonRpc;



interface TestServiceInterface
{
    public function demoWithCoruntine(): array;

    public function demoWithOutCoruntine(): array;

    public function test(): string;
}