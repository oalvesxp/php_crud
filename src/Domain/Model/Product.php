<?php

namespace Serenatto\Crud\Domain\Model;

class Product
{
    public function __construct(
        private int $id,
        private string $tipo,
        private string $nome,
        private string $descricao,
        private string $imagem,
        private float $preco
    ) {}

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getPreco(): string
    {
        return $this->preco;
    }
}
