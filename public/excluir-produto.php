<?php

use Serenatto\Crud\Infraestructure\Persistence\ConnectionCreator;
use Serenatto\Crud\Infraestructure\Repository\CrudProductRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$connection = ConnectionCreator::Connection();
$repository = New CrudProductRepository($connection);

$repository->deletar($_POST['id']);

header('Location: /admin.php');
