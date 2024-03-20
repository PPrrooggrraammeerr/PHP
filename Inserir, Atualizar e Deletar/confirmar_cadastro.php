<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Atualizar ou Deletar</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: lightgrey;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
		}

		.container {
			max-width: 100%;
			width: auto;
			margin: auto;
			background-color: #fff;
			padding: 95px;
			border-radius: 8px;
			box-sizing: border-box;
		}

		h1 {
			text-align: center;
			margin-bottom: 20px;
		}

		table {
			width: 100%;
			border: 1px solid black;
			border-radius: 5px;
			margin: 0 auto;
		}

		th, td {
			font-size: 19px;
			text-align: center;
			padding: 5px;
			border: 1px solid black;
			border-radius: 5px;
		}

		th {
			background-color: #005eff;
			color: white;
		}

		.atualizar, .deletar {
			font-size: 19px;
			padding: 10px 20px;
			color: white;
			border: none;
			border-radius: 5px;
			font-weight: bold;
			cursor: pointer;
		}

		.deletar {
			background-color: red;
			border: 8px solid darkred;
		}
		
		.atualizar {
			background-color: green;
			border: 8px solid darkgreen;
		}

		.atualizar, .deletar {
			width: auto;
		}
		
		input {
			font-size: 19px;
			padding: 20px;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<h1>Atualizar ou Deletar</h1>
		<br>
		<table>
			<tr>
				<th>E-mail</th>
				<th>Senha</th>
				<th>Ação</th>
			</tr>
			<tr>
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
				
				$consulta = 'SELECT * FROM usuarios';
				$stmt = $pdo->prepare($consulta);
				
				$executar = $stmt->execute();
				
				$resultados = array($executar);
				
				foreach ($resultados as $resultado) {
					echo $resultado;
				}
				
				?>
				<td> <input type="email" placeholder="E-mail" required> </td>
				<td> <input type="password" placeholder="Senha"> </td>
				<td> <button class="atualizar" type="submit" name="atualizar">Inserir</button> <button class="atualizar" type="submit" name="atualizar">Atualizar</button> <button class="deletar" type="submit" name="deletar">Deletar</button> </td>
			</tr>
		</table>
		<br>
	</div>
</body>
</html>



