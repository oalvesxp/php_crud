<?php

$dir = __DIR__ . '/serenattodb.sqlite';
$pdo = new PDO(dsn: 'sqlite:' . $dir);

$qry = '
    CREATE TABLE IF NOT EXISTS 
        PR1010 (
            PR1_ID INTEGER PRIMARY KEY,
            PR1_TIPO VARCHAR(45) NOT NULL,
            PR1_NOME VARCHAR(45) NOT NULL,
            PR1_DESC VARCHAR(90) NOT NULL,
            PR1_IMG VARCHAR(80) NOT NULL,
            PR1_PREC DECIMAL(5,2) NOT NULL
        );
';

$pdo->exec($qry);
