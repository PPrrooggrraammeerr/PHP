<?php

session_start();

require 'connect.php';
require 'repositories/pedido_cafe.class.php';
require 'repositories/pedido_almoco.class.php';

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
} elseif (!isset($_SESSION['senha'])){
    header('Location: index.php');
    exit;
} else {

    $time_page = 3600;

    if (isset($_SESSION['login_time'])) {

        $time_past = time() - $_SESSION['login_time'];

        if ($time_past >= $time_page) {
            header('Location: sair.php');
            exit;
        }

    }

    $_SESSION['login_time'] = time();

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/administrador.css">
    <title>Serenatto - Home</title>
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
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th colspan="2">Ação</th>
                    </tr>
                </thead>
				<?php

                if (isset($_POST['deletar_cafe'])) {

                    $id = $_POST['id_cafe'];

                    $deletar_pedido_cafe = new pedido_cafe($pdo);
                    $result = $deletar_pedido_cafe->deletar_pedido_cafe($id);

                    if ($result == true) {
                        echo '<script> alert("Order deleted with successful!") </script>';
                        echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
                    } elseif ($result == false) {
                        echo '<script> alert("Order not deleted!") </script>';
                        echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
                    }

                } elseif (isset($_POST['deletar_almoco'])) {

                    $id = $_POST['id_almoco'];

                    $deletar_pedido_almoco = new pedido_almoco($pdo);
                    $result = $deletar_pedido_almoco->deletar_pedido_almoco($id);

                    if ($result) {
                        echo '<script> alert("Order deleted with successful!") </script>';
                        echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
                    } else {
                        echo '<script> alert("Order not deleted!") </script>';
                        echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
                    }

                } else {
                    
                }

                ?>
                <tbody>
                    <?php
                        $sql = 'SELECT * FROM cardapio_cafe ORDER BY preco ASC';
                        $stmt = $pdo->query($sql);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            $exteriorizar = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($exteriorizar as $key) {
                                $formatar_preco = number_format((float)$key['preco'], 2, ',', '');
                    ?>
                    <tr>
                        <td><?php echo $key['cafe'];?></td>
                        <td><?php echo $key['tipo'];?></td>
                        <td><?php echo $key['descricao'];?></td>
                        <td><?php echo 'R$ ' . $formatar_preco;?></td>
                        <td>
                            <a class="botao-editar" name="pedido_cafe" style="background-color: green;" href="pedido_cafe.php?id_pedido_cafe=<?php echo $key['id']; $_SESSION['id_pedido_cafe'] = $key['id']; ?>">Pedir</a>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id_cafe" value="<?php echo ($key['id']);?>">
                                <input type="submit" name="deletar_cafe" class="botao-excluir" value="Cancelar">
                            </form>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>

                    <?php
                        $sql = 'SELECT * FROM cardapio_almoco ORDER BY preco ASC';
                        $stmt = $pdo->query($sql);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            $exteriorizar = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($exteriorizar as $key) {
                                $formatar_preco = number_format((float)$key['preco'], 2, ',', '');
                    ?>
                    <tr>
                        <td><?php echo $key['prato'];?></td>
                        <td><?php echo $key['tipo'];?></td>
                        <td><?php echo $key['descricao'];?></td>
                        <td><?php echo 'R$ ' . $formatar_preco;?></td>
                        <td>
                            <a class="botao-editar" name="pedido_almoco" style="background-color: green;" href="pedido_almoco.php?id_pedido_almoco=<?php echo $key['id']; $_SESSION['id_pedido_almoco'] = $key['id']; ?>">Pedir</a>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id_almoco" value="<?php echo ($key['id']);?>">
                                <input type="submit" name="deletar_almoco" class="botao-excluir" value="Cancelar">
                            </form>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <form action="confirmar_pedidos.php" method="POST">
                <button type="submit" class="botao-cadastrar" name="confirmar_pedidos">Confirmar Pedido(s)</button>
            </form>
            <form action="lista_pedidos.php" method="POST">
                <input type="hidden" name="pedidos_ids" id="pedidos_ids"></input>
                <input type="submit" class="botao-cadastrar" value="Lista Pedidos"></input>
            </form>
        </section>
    </main>
</body>
</html>