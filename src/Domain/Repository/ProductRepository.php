<?php

namespace Serenatto\Crud\Domain\Repository;

interface ProductRepository
{
    public function cafe(): array;
    public function almoco(): array;
}