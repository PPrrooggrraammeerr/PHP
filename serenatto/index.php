<?php

require 'connect.php';
require 'repositories/cardapio_cafe.class.php';
require 'repositories/cardapio_almoco.class.php';

$cardapio_cafe = new cardapio_cafe($pdo);
$cardapio_cafe->verificar_cafe();

$cardapio_almoco = new cardapio_almoco($pdo);
$cardapio_almoco->verificar_almoco();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="images/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="images/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="images/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php 
                    $sql = 'SELECT * FROM cardapio_cafe ORDER BY preco';
                    $stmt = $pdo->query($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $exteriorizar = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($exteriorizar as $key) {
                ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?php echo $key['imagem'];?>">
                    </div>
                    <p><?php echo $key['cafe'];?></p>
                    <p><?php echo $key['descricao'];?></p>
                    <p><?php echo "R$ " . $key['preco'];?></p>
                </div>
                <?php   
                        }
                    }
                ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="images/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php 
                    $sql = 'SELECT * FROM cardapio_almoco ORDER BY preco';
                    $stmt = $pdo->query($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $exteriorizar = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($exteriorizar as $key) {
                ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?php echo $key['imagem'];?>">
                    </div>
                    <p><?php echo $key['prato'];?></p>
                    <p><?php echo $key['descricao'];?></p>
                    <p><?php echo "R$ " . $key['preco'];?></p>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>