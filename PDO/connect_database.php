<?php

$host = 'localhost:3307';
$user = 'root';
$password = '';
$database = 'database_name';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $password, $options);

if ($pdo) {
    echo "<script>alert('Connected successful!')</script>";
}

?>