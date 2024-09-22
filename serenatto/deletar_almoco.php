<?php

require 'connect.php';
require 'repositories/cardapio_almoco.class.php';

session_start();

$email_administrador = 'administrador@serenatto.com.br';
$senha_administrador = md5('serenatto');

if (!isset($_SESSION['email']) or !isset($_SESSION['senha']) or $_SESSION['email'] != $email_administrador or md5($_SESSION['senha']) != $senha_administrador) {
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