<?php

require 'connect.php';
require 'repositories/cardapio_almoco.class.php';

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
} elseif (!isset($_SESSION['senha'])) {
    header('Location: index.php');
    exit;
} else {

    if (isset($_POST['deletar'])) {
    	
    	$cardapio_almoco = new cardapio_almoco($pdo);

        $id = $_POST['id'];

        if ($cardapio_almoco->deletar_almoco($id)) {
            header ('Location: administrador.php');
            exit;
        } else {
            echo "<script> alert('Delete not successful!') </script>";
            echo "<meta http-equiv=refresh content='0;URL=./administrador.php'>";
        }

    }

}

?>