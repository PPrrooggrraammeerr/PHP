<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
} elseif (!isset($_SESSION['senha'])){
    header('Location: index.php');
    exit;
} else {

}

?>