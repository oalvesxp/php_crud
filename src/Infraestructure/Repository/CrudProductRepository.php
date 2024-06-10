<?php

namespace Serenatto\Crud\Infraestructure\Repository;

use Serenatto\Crud\Domain\Repository\ProductRepository;
use PDO;

class CrudProductRepository implements ProductRepository 
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function cafe(): array
    {
        return $cafe = [];
    }

    public function almoco(): array
    {
        return $almoco = [];
    }
}
