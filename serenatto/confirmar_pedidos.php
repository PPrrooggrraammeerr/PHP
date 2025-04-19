<?php

session_start();

require 'connect.php';

if (isset($_POST['confirmar_pedidos'])) {

    $find_id = 'SELECT id FROM usuarios_serenatto WHERE email = :email';
    $stmt = $pdo->prepare($find_id);

    $stmt->bindParam(':email', $_SESSION['email']);

    $result = $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $key = $stmt->fetch(PDO::FETCH_ASSOC);

    }

    $id_usuario_pedido = $key['id'];

    $find_pedidos_cafe = 'SELECT id_pedido_cafe FROM pedidos_cafe WHERE id_usuario = :id_usuario';
    $stmt = $pdo->prepare($find_pedidos_cafe);

    $stmt->bindParam(':id_usuario', $id_usuario_pedido);

    $result = $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $pedidos_cafe = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    $find_pedidos_almoco = 'SELECT id_pedido_almoco FROM pedidos_almoco WHERE id_usuario = :id_usuario';
    $stmt = $pdo->prepare($find_pedidos_almoco);

    $stmt->bindParam(':id_usuario', $id_usuario_pedido);

    $result = $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $pedidos_almoco = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    array_map(function($pedido_cafe, $pedido_almoco) use ($pdo, $id_usuario_pedido) {

        $id_cafe_pedido = $pedido_cafe['id_pedido_cafe'];
        $id_almoco_pedido = $pedido_almoco['id_pedido_almoco'];

        $sql = 'INSERT INTO pedidos_serenatto (id_usuario, id_pedido_cafe, id_pedido_almoco) VALUES (:id_usuario, :id_pedido_cafe, :id_pedido_almoco)';
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id_usuario', $id_usuario_pedido);
        $stmt->bindParam(':id_pedido_cafe', $id_cafe_pedido);
        $stmt->bindParam(':id_pedido_almoco', $id_almoco_pedido);

        $result = $stmt->execute();

        if ($result) {
            echo '<script> alert("Orders confirmed successfully!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
        } else {
            echo '<script> alert("Orders not confirmed!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
        }

    }, $pedidos_cafe, $pedidos_almoco);

}

?>