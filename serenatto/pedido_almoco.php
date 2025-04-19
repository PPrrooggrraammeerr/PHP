<?php

session_start();

require 'connect.php';
require 'repositories/pedido_almoco.class.php';

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
} elseif (!isset($_SESSION['senha'])) {
	header('Location: index.php');
    exit;
} else {

    $pedir_almoco = new pedido_almoco($pdo);
    $buscar_id_usuario = $pedir_almoco->id_pedir_almoco($_SESSION['email']);

    if ($buscar_id_usuario) {

	    if (isset($_GET['id_pedido_almoco'])) {

	        $id_usuario = $buscar_id_usuario;
		    $id_pedido_almoco = $_GET['id_pedido_almoco'];

		    $enviar_pedido_almoco = new pedido_almoco($pdo);
		    $result_insert = $enviar_pedido_almoco->enviar_pedido_almoco($id_usuario, $id_pedido_almoco);

		    if ($result_insert) {
		    	echo '<script> alert("Order placed successfully!") </script>';
	            echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
		    } else {
		    	echo '<script> alert("Order not placed!") </script>';
	            echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
		    }

		}

	} else {
        echo '<script> alert("ID not found!") </script>';
	    echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
	}

}

?>