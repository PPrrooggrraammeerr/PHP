<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bcrypt</title>
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
		<form action="bcrypt.php" method="POST">
			<h2>Bcrypt</h2>
			<hr>
			<br>
			<div>
				<label for="email">E-mail:</label>
				<input type="email" id="email" name="email_login" placeholder="E-mail" required>
			</div>
			<div>
				<label for="email">Senha:</label>
				<input type="password" id="email" name="bcrypt_login" placeholder="Senha" required>
			</div>
			<button type="submit" name="email_bcrypt"><b>Login</b></button>
		</form>
	    <form action="bcrypt.php" method="POST">
			<h2>Cadastrar</h2>
			<hr>
			<br>
			<div>
				<label for="email">E-mail:</label>
				<input type="email" id="email" name="email_cadastred" placeholder="E-mail" required>
			</div>
			<div>
				<label for="email">Senha:</label>
				<input type="password" id="email" name="bcrypt_cadastred" placeholder="Senha" required>
			</div>
			<button type="submit" name="cadastred"><b>Cadastrar</b></button>
		</form>
	</div>
</body>
</html>
<?php

require 'hashs.class.php';

if (isset($_POST['email_bcrypt'])) {

    $email = $_POST['email_login'];
    $senha = $_POST['bcrypt_login'];

    $bcrypt = new hashs($pdo);

    if ($bcrypt->bcrypt_hash_verify($email, $senha)) {
    	echo '<script> alert("Login successful, with hash of type Bcrypt!") </script>';
    	echo "<meta http-equiv=refresh content='0;URL=./'>";
    } else {
    	echo '<script> alert("Login not successful!") </script>';
    }

} elseif (isset($_POST['cadastred'])) {

    $email = $_POST['email_cadastred'];
    $senha = password_hash($_POST['bcrypt_cadastred'], PASSWORD_DEFAULT);

    $bcrypt = new hashs($pdo);

    if ($bcrypt->bcrypt_hash_cadastred($email, $senha)) {
    	echo '<script> alert("Cadastred successful, with hash of type Bcrypt!") </script>';
    	echo "<meta http-equiv=refresh content='0;URL=./'>";
    } else {
    	echo '<script> alert("Cadastred not successful!") </script>';
    }

}

?>