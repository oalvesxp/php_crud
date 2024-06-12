<?php

use Serenatto\Crud\Infraestructure\Persistence\ConnectionCreator;
use Serenatto\Crud\Infraestructure\Repository\CrudProductRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$connection = ConnectionCreator::Connection();
$repository = New CrudProductRepository($connection);

$produtos = $repository->allProducts();

?>

<style>
    
    table{
        width: 90%;
        margin: auto 0;
    }

    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
        font-size: 18px;
        padding: 8px;
    }
    
    .container-admin-banner h1{
        margin-top: 40px;
        font-size: 30px;
    }
    
</style>
<table>
    <thead>
        <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Descricão</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($produtos as $item):?>
        <tr>
            <td><?= $item->getNome(); ?></td>
            <td><?= $item->getTipo(); ?></td>
            <td><?= $item->getDescricao(); ?></td>
            <td><?= $item->getPrecoFormatado(); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>