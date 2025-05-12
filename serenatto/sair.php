<?php

session_start();

if (isset($_SESSION['email']) and ($_SESSION['senha'])) {
    session_destroy();
}

header('Location: index.php');
exit;

?>