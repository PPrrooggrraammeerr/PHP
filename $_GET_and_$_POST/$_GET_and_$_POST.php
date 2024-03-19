<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$_GET and $_POST</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
			color: #333;
			margin-top: 100px;
		}

		.container {
			display: flex;
			justify-content: center;
		}

		form {
			max-width: 315px;
			margin: 75px 75px;
			padding: 29px;
			background-color: #fff;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
			flex-basis: calc(19% - 15px);
			height: 305px;
		}

		div {
			margin-bottom: 10px;
		}

		label {
			display: block;
			font-weight: bold;
		}

		input[type="email"], input[type="password"] {
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
	<div class="container">
		<form action="$_GET_and_$_POST.php" method="GET">
			<h2>$_GET</h2>
			<hr>
			<br>
			<div>
				<label for="email">E-mail:</label>
				<input type="email" id="email" name="email_get" placeholder="E-mail" required>
			</div>
			<div>
				<label for="email">Senha:</label>
				<input type="password" id="email" name="senha_get" placeholder="Senha" required>
			</div>
			<button type="submit" name="login_get">Login</button>
		</form>
		<form action="$_GET_and_$_POST.php" method="POST">
			<h2>$_POST</h2>
			<hr>
			<br>
			<div>
				<label for="email">E-mail:</label>
				<input type="email" id="email" name="email_post" placeholder="E-mail" required>
			</div>
			<div>
				<label for="email">Senha:</label>
				<input type="password" id="email" name="senha_post" placeholder="Senha" required>
			</div>
			<button type="submit" name="login_post">Login</button>
		</form>
	<div>
</body>
</html>
<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'login';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $password, $options);

if (isset($_GET['login_get'])) {
	
	$email = $_GET['email_get'];
	$senha = $_GET['senha_get'];
	
	$login_get = 'INSERT INTO usuarios (email, senha) VALUES (:email_get, :senha_get)';
	$stmt = $pdo->prepare($login_get);
	
	$stmt->bindParam(':email_get', $email);
	$stmt->bindParam(':senha_get', $senha);
	
	$result_get = $stmt->execute();
	
	if ($result_get) {
		echo '<script> alert("Login successful, but GET is not secure!") </script>';
	} else {
		echo '<script> alert("Login not successful!") </script>';
	}
	
} else if (isset($_POST['login_post'])) {
	
	$email = $_POST['email_post'];
	$senha = $_POST['senha_post'];
	
	$login_post = 'INSERT INTO usuarios (email, senha) VALUES (:email_post, :senha_post)';
	$stmt = $pdo->prepare($login_post);
	
	$stmt->bindParam(':email_post', $email);
	$stmt->bindParam(':senha_post', $senha);
	
	$result_post = $stmt->execute();
	
	if ($result_post) {
		echo '<script> alert("Login successful, but POST is secure!") </script>';
	} else {
		echo '<script> alert("Login not successful!") </script>';
	}
	
}

?>