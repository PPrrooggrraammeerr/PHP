<?php

session_start();

require 'connect.php';
require 'repositories/pedido_cafe.class.php';

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
} elseif (!isset($_SESSION['senha'])) {
	header('Location: index.php');
    exit;
} else {

    $pedir_cafe = new pedido_cafe($pdo);
    $buscar_id_usuario = $pedir_cafe->id_pedir_cafe($_SESSION['email']);

    if ($buscar_id_usuario) {

	    if (isset($_GET['id_pedido_cafe'])) {

	        $id_usuario = $buscar_id_usuario;
		    $id_pedido_cafe = $_GET['id_pedido_cafe'];

		    $enviar_pedido_cafe = new pedido_cafe($pdo);
		    $result_insert = $enviar_pedido_cafe->enviar_pedido_cafe($id_usuario, $id_pedido_cafe);

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