<?php

namespace Serenatto\Crud\Domain\Repository;

interface ProductRepository
{
    public function itensCafe(): array;
    public function itensAlmoco(): array;
    public function allProducts(): array;
}