<?php

require 'connect.php';
require 'repositories/cardapio_cafe.class.php';
require 'repositories/cardapio_almoco.class.php';

$cardapio_cafe = new cardapio_cafe($pdo);
$cardapio_cafe->verificar_cafe();

$cardapio_almoco = new cardapio_almoco($pdo);
$cardapio_almoco->verificar_almoco();

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
} elseif (!isset($_SESSION['senha'])){
    header('Location: index.php');
    exit;
} else {

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/administrador.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="images/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Admin</title>
</head>
<body>
    <main>
        <section class="container-admin-banner">
            <img src="images/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
            <h1>Admistração Serenatto</h1>
            <img class= "ornaments" src="images/ornaments-coffee.png" alt="ornaments">
        </section>
        <h2>Lista de Produtos</h2>
        <section class="container-table">
        <table>
            <thead>
                <tr>
                <th>Produto</th>
                <th>Tipo</th>
                <th>Descricão</th>
                <th>Valor</th>
                <th colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = 'SELECT * FROM cardapio_cafe ORDER BY preco';
                    $stmt = $pdo->query($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $exteriorizar = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($exteriorizar as $key) {
                ?>
                <tr>
                    <td><?php echo $key['cafe'];?></td>
                    <td><?php echo $key['tipo'];?></td>
                    <td><?php echo $key['descricao'];?></td>
                    <td><?php echo 'R$ ' . $key['preco'];?></td>
                    <td><a class="botao-editar" href="editar_produto.php?id=<?php echo ($key['id']);?>">Editar</a></td>
                    <td>
                        <form action="deletar_cafe.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo ($key['id']);?>">
                            <input type="submit" name="deletar" class="botao-excluir" value="Excluir">
                        </form>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <?php
                    $sql = 'SELECT * FROM cardapio_almoco ORDER BY preco';
                    $stmt = $pdo->query($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $exteriorizar = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($exteriorizar as $key) {
                ?>
                <tr>
                    <td><?php echo $key['prato'];?></td>
                    <td><?php echo $key['tipo'];?></td>
                    <td><?php echo $key['descricao'];?></td>
                    <td><?php echo 'R$ ' . $key['preco'];?></td>
                    <td>
                        <a class="botao-editar" href="editar_produto.php?id=<?php echo ($key['id']);?>">Editar</a>
                    </td>
                    <td>
                        <form action="deletar_almoco.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo ($key['id']);?>">
                            <input type="submit" name="deletar" class="botao-excluir" value="Excluir">
                        </form>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <a class="botao-cadastrar" href="cadastrar_produto.php">Cadastrar produto</a>
        <form action="baixar_relatorio.php" method="POST">
            <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
        </form>
        </section>
    </main>
</body>
</html>
<?php

}

?>