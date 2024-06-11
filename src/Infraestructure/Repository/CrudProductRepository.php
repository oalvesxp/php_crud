<?php

namespace Serenatto\Crud\Infraestructure\Repository;

use Serenatto\Crud\Domain\Repository\ProductRepository;
use Serenatto\Crud\Domain\Model\Product;
use PDO;

class CrudProductRepository implements ProductRepository 
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function itensCafe(): array
    {
        $qry = "
            SELECT * FROM PR1010 WHERE PR1_TIPO = 'Café' ORDER BY PR1_PREC ASC;
        ";
        
        $stmt = $this->connection->query($qry);
        $produtos = $stmt->fetchAll();

        $dadosCafe = array_map(function($cafe) {
            return new Product(
                $cafe['PR1_ID'],
                $cafe['PR1_TIPO'],
                $cafe['PR1_NOME'],
                $cafe['PR1_DESC'],
                $cafe['PR1_IMG'],
                $cafe['PR1_PREC']
            );
        }, $produtos);

        return $dadosCafe;
    }

    public function itensAlmoco(): array
    {
        $qry = "
            SELECT * FROM PR1010 WHERE PR1_TIPO = 'Almoço' ORDER BY PR1_PREC ASC;
        ";

        $stmt = $this->connection->query($qry);
        $produtos = $stmt->fetchAll();

        foreach ($produtos as $almoco) {
            $dadosAlmoco[] = new Product(
                $almoco['PR1_ID'],
                $almoco['PR1_TIPO'],
                $almoco['PR1_NOME'],
                $almoco['PR1_DESC'],
                $almoco['PR1_IMG'],
                $almoco['PR1_PREC']
            );
        }
        
        return $dadosAlmoco;
    }

    public function allProducts(): array
    {
        $qry = "
            SELECT * FROM PR1010 ORDER BY PR1_PREC ASC;
        ";

        $stmt = $this->connection->query($qry);
        $produtos = $stmt->fetchAll();

        foreach ($produtos as $item) {
            $itens[] = new Product(
                $item['PR1_ID'],
                $item['PR1_TIPO'],
                $item['PR1_NOME'],
                $item['PR1_DESC'],
                $item['PR1_IMG'],
                $item['PR1_PREC']
            );
        }
        
        return $itens;
    }
}
