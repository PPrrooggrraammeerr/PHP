<?php

defined('CONTROL') or die('Acesso negado!');

session_destroy();

header('location: index.php?rota=login');

?>