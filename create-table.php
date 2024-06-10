<?php

use Serenatto\Crud\Infraestructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::Connection();
$connection->beginTransaction();

try{
    $connection->exec('
        CREATE TABLE IF NOT EXISTS 
            PR1010 (
                PR1_ID INTEGER PRIMARY KEY,
                PR1_TIPO VARCHAR(45) NOT NULL,
                PR1_NOME VARCHAR(45) NOT NULL,
                PR1_DESC VARCHAR(90) NOT NULL,
                PR1_IMG VARCHAR(80) NOT NULL,
                PR1_PREC DECIMAL(5,2) NOT NULL
            );   
    ');

    $connection->commit();
} catch (\PDOException $e) {
    $connection->rollBack();
    echo $e->getMessage();
}
