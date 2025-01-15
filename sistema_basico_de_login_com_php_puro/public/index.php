<?php

session_start();

define('CONTROL', true);

$usuario_logado = $_SESSION['usuario'] ?? null;

if (empty($usuario_logado)) {
    $rota = 'login';
} else {
    $rota = $_GET['rota'] ?? 'home';
}

if (!empty($usuario_logado) && $rota == 'login') {
    $rota = 'home';
}

$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'page1' => 'page1.php',
    'page2' => 'page2.php',
    'page3' => 'page3.php',
    'logout' => 'logout.php'
];

if (!key_exists($rota, $rotas)) {
    die('Acesso negado!');
} else {
    require_once $rotas[$rota];
}

?>
