<?php

use Serenatto\Crud\Infraestructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::Connection();
$connection->beginTransaction();

try{
    $connection->exec("
        INSERT INTO PR1010 
            (
                PR1_TIPO
                , PR1_NOME
                , PR1_DESC
                , PR1_PREC
                , PR1_IMG
            ) VALUES 
                ('Café', 'Café Cremoso', 'Café cremoso irresistivelmente suave e que envolve seu paladar', '5.00', 'cafe-cremoso.jpg')
                , ('Café', 'Café com Leite', 'A harmonia perfeita do café e do leite, uma experiência reconfortante', '2.00', 'cafe-com-leite.jpg')
                , ('Café', 'Cappuccino', 'Café suave, leite cremoso e uma pitada de sabor adocicado', '7.00', 'cappuccino.jpg')
                , ('Café', 'Café Gelado', 'Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.', '3.00', 'cafe-gelado.jpg')
                , ('Almoço', 'Bife', 'Bife, arroz com feijão e uma deliciosa batata frita', '27.90', 'bife.jpg')
                , ('Almoço', 'Filé de peixe', 'Filé de peixe salmão assado, arroz, feijão verde e tomate.', '24.99', 'prato-peixe.jpg')
                , ('Almoço', 'Frango', 'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante', '23.00', 'prato-frango.jpg')
                , ('Almoço', 'Fettuccine', 'Prato italiano autêntico da massa do fettuccine com peito de frango grelhado', '22.50', 'fettuccine.jpg');

    ");

    $connection->commit();
} catch (\PDOException $e) {
    $connection->rollBack();
    echo $e->getMessage();
}
