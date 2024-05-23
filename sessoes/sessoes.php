<?php

session_start ();
	
if (isset($_POST['email_session'], $_POST['senha_session'])) {
	
	$email_armazenado = 'email@email.com';
	$senha_armazenada = 'senha';
	
	$email_informado = $_POST['email_session'];
	$senha_informada = $_POST['senha_session'];
	
	if ($email_armazenado === $email_informado && $senha_armazenada === $senha_informada) {
		$_SESSION['email_session'] = $_POST['email_session'];
		header ('Location: acesso.php');
		exit ();
	} else {
		echo '<script> alert("Login not successful with session!") </script>';
		echo "<meta http-equiv=refresh content='0;URL=sessoes.php'>";
	}
	
}
	
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessões</title>
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
<div class="container">
	<form action="sessoes.php" method="POST">
		<h2>Sessões</h2>
		<hr>
		<br>
		<div>
			<label for="email">E-mail:</label>
			<input type="email" id="email" name="email_session" placeholder="E-mail" required>
		</div>
		<div>
			<label for="email">Senha:</label>
			<input type="password" id="email" name="senha_session" placeholder="Senha" required>
		</div>
		<button type="submit" name="login_session">Login</button>
	</form>
</div>
</body>
</html>