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

    public function formarObjeto(array $dados): object
    {
        foreach ($dados as $item) {
            $produto = new Product(
                $item['PR1_ID'],
                $item['PR1_TIPO'],
                $item['PR1_NOME'],
                $item['PR1_DESC'],
                $item['PR1_PREC'],
                $item['PR1_IMG']
            );
        }

        return $produto;
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
                $cafe['PR1_PREC'],
                $cafe['PR1_IMG']
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
                $almoco['PR1_PREC'],
                $almoco['PR1_IMG']
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
                $item['PR1_PREC'],
                $item['PR1_IMG']
            );
        }
        
        return $itens;
    }

    public function deletar(int $id): void
    {
        $qry = "
            DELETE FROM PR1010 WHERE PR1_ID = ?
        ";

        $stmt = $this->connection->prepare($qry);
        $stmt->bindValue(1 ,$id);
        $stmt->execute();
    }

    public function salvar(Product $produto): void
    {
        $qry = "
            INSERT INTO PR1010 
            (
                PR1_TIPO
                , PR1_NOME
                , PR1_DESC                
                , PR1_PREC
                , PR1_IMG
            ) VALUES 
                (:tipo, :nome , :descricao, :preco, :img)
        ";

        $stmt = $this->connection->prepare($qry);
        $stmt->bindValue('tipo',  $produto->getTipo());
        $stmt->bindValue('nome',  $produto->getNome());
        $stmt->bindValue('descricao',  $produto->getDescricao());
        $stmt->bindValue('preco',  $produto->getPreco());
        $stmt->bindValue('img',  $produto->getImagem());
        $stmt->execute();
    }

    public function buscar(int $id): object
    {
        $qry = "
            SELECT * FROM PR1010 WHERE PR1_ID = ?
        ";

        $stmt = $this->connection->prepare($qry);
        $stmt->bindValue(1 ,$id);
        $stmt->execute();
        
        $dados = $stmt->fetchAll();
        
        return $this->formarObjeto($dados);
    }

    public function alterar(Product $produto): void
    {
        $qry = "
            UPDATE PR1010 
            SET 
                PR1_TIPO = :tipo
                , PR1_NOME = :nome
                , PR1_DESC = :descricao             
                , PR1_PREC = :preco
            WHERE
                PR1_ID = :id
        ";

        $stmt = $this->connection->prepare($qry);

        $stmt->bindValue('id' , $produto->getId());
        $stmt->bindValue('tipo' , $produto->getTipo());
        $stmt->bindValue('nome' , $produto->getNome());
        $stmt->bindValue('descricao' , $produto->getDescricao());
        $stmt->bindValue('preco' , $produto->getPreco());
        
        $stmt->execute();
    }
}
