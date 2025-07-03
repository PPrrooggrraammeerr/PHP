<?php

require_once ('../database/conn.php');

$id = filter_input(INPUT_POST, 'id');
$completed = filter_input(INPUT_POST, 'completed');

if ($id && $completed) {

    $sql = $pdo->prepare("UPDATE tasks SET completed = :completed WHERE id = :id");
    $sql->bindValue(':completed', $completed);
    $sql->bindValue(':id', $id);
    $sql->execute();

    echo json_encode(['success' => 1]);
    exit;

} else {
    echo json_encode(['success' => 0]);
    exit;
}