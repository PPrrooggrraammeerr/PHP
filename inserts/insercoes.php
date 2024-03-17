<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserções</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
			color: #333;
			margin-top: 100px;
		}

		form {
			max-width: 315px;
			margin: 20px auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
		}

		div {
			margin-bottom: 10px;
		}

		label {
			display: block;
			font-weight: bold;
		}

		input[type="text"], input[type="email"] {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			border: 1px solid #ddd;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 8px;
		}
		
		textarea {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			border: 1px solid #ddd;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 8px;
		}

		button {
			width: 100%;
			padding: 10px;
			background-color: #0056b3;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #004494;
		}
	</style>
</head>
<body>
    <form method="POST">
		<h2>Inserções</h2>
		<hr>
		<br>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome" required>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="E-mail" required>
        </div>
        <div>
            <label for="comentario">Comentário:</label>
            <textarea id="comentario" name="comentario" placeholder="Comentário" required></textarea>
        </div>
        <button type="submit" name="inserir">Inserir</button>
    </form>
</body>
</html>
<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'insercoes';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $password, $options);

if (isset ($_POST['inserir'])) {
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$comentario = $_POST['comentario'];
	
	$inserir_valores = 'INSERT INTO feedbacks (nome, email, comentario) VALUES (:nome, :email, :comentario)';
	$stmt = $pdo->prepare($inserir_valores);
	
	$stmt->bindValue(':nome', $nome);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':comentario', $comentario);
	
    $result = $stmt->execute();

	if ($result) {
		echo '<script> alert("Insert successful!") </script>';
	} else {
		echo '<script> alert("Insert not successful") </script>';
	}
	
}

?>