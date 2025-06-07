<?php

session_start();

if (!isset($_SESSION['carrinho_compras'])) {
    header('Location: ./');
    exit;
} else {

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrinho de Compras PHP</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2.title {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #069;
            width: 100%;
            padding: 20px;
            text-align: center;
            color: white;
        }

        div.carrinho_compras {
            max-width: 1200px;
            margin: 10px auto;
            padding-bottom: 10px;
            border-bottom: 2px dotted #ccc;
        }

        p {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 19px;
            color: gray;
        }
    </style>
</head>
<body>
    <h2 class="title">Carrinho com PHP</h2>
    <?php

    foreach ($_SESSION['carrinho_compras'] as $key => $value) {

        echo '<div class=carrinho_compras>';
        echo '<p style="text-align: center;">Nome: ' . $value['nome'] . ' | Quantidade: ' . $value['quantidade'] . ' | Preço: R$ ' . $value['quantidade'] * $value['preco'] . ',00</p>';
        echo '</div>';

    }

    ?>
</body>
</html>