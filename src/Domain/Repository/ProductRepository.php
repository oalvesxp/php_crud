<?php

namespace Serenatto\Crud\Domain\Repository;

use Serenatto\Crud\Domain\Model\Product;

interface ProductRepository
{
    public function itensCafe(): array;
    public function itensAlmoco(): array;
    public function allProducts(): array;
    public function deletar(int $id): void;
    public function salvar(Product $produto): void;
}