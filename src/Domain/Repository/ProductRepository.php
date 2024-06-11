<?php

namespace Serenatto\Crud\Domain\Repository;

use ArrayAccess;
use Serenatto\Crud\Domain\Model\Product;

interface ProductRepository
{
    public function formarObjeto(array $dados): object;
    public function itensCafe(): array;
    public function itensAlmoco(): array;
    public function allProducts(): array;
    public function deletar(int $id): void;
    public function salvar(Product $produto): void;
    public function buscar(int $id): object;
}
