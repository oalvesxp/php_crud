<?php

use Serenatto\Crud\Domain\Model\Product;
use Serenatto\Crud\Infraestructure\Persistence\ConnectionCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$connection = ConnectionCreator::Connection();
    
$qry1 = "
    SELECT * FROM PR1010 WHERE PR1_TIPO = 'Café' ORDER BY PR1_PREC ASC;
";

$stmt = $connection->query($qry1);
$produtosCafe = $stmt->fetchAll();

$dadosCafe = array_map(function($cafe) {
    return new Product(
        $cafe['PR1_ID'],
        $cafe['PR1_TIPO'],
        $cafe['PR1_NOME'],
        $cafe['PR1_DESC'],
        $cafe['PR1_IMG'],
        $cafe['PR1_PREC']
    );
}, $produtosCafe);


$qry2 = "
    SELECT * FROM PR1010 WHERE PR1_TIPO = 'Almoço' ORDER BY PR1_PREC ASC;
";

$stmt = $connection->query($qry2);
$produtosAlmoco = $stmt->fetchAll();

$dadosAlmoco = array_map(function($almoco) {
    return new Product(
        $almoco['PR1_ID'],
        $almoco['PR1_TIPO'],
        $almoco['PR1_NOME'],
        $almoco['PR1_DESC'],
        $almoco['PR1_IMG'],
        $almoco['PR1_PREC']
    );
}, $produtosAlmoco);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach ($dadosCafe as $cafe): ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= "img/" . $cafe->getImagem();?>">
                        </div>
                        <p><?= $cafe->getNome();?></p>
                        <p><?= $cafe->getDescricao();?></p>
                        <p><?= "R$ " . number_format($cafe->getPreco(), 2);?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach ($dadosAlmoco as $almoco): ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= "img/" . $almoco->getImagem();?>">
                        </div>
                        <p><?= $almoco->getNome();?></p>
                        <p><?= $almoco->getDescricao();?></p>
                        <p><?= "R$ " . number_format($almoco->getPreco(), 2);?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </section>
    </main>
</body>
</html>