<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Atualizar ou Deletar</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f8f8ff;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
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

		.inserir, .atualizar, .deletar {
			font-size: 19px;
			padding: 10px 20px;
			color: white;
			border: none;
			border-radius: 5px;
			font-weight: bold;
			cursor: pointer;
		}

		.inserir {
			background-color: khaki;
			border: 8px solid darkkhaki;
		}
		
		.atualizar {
			background-color: green;
			border: 8px solid darkgreen;
		}
		
		.deletar {
			background-color: red;
			border: 8px solid darkred;
		}

		.inserir, .atualizar, .deletar {
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
		<br> <br> <br>
		<h1>Inserir, Atualizar ou Deletar</h1>
		<br> <br> <br>
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
				
				?>
				<form action="inserts_updates_deletes.php" method="POST">
					<td> <input type="email" name="inserir_email" placeholder="E-mail" required> </td>
					<td> <input type="password" name="inserir_senha" placeholder="Senha" required> </td>
					<td> <button class="inserir" type="submit" name="inserir">Inserir</button> <button class="atualizar" type="submit">Atualizar</button> <button class="deletar" type="submit">Deletar</button> </td>
				</form>
				<?php
					
				if (isset($_POST['inserir'])) {
					
					$email = $_POST['inserir_email'];
					$senha = $_POST['inserir_senha'];
					
					$inserir = 'INSERT INTO usuarios (email, senha) VALUES (:email, :senha)';
					$stmt = $pdo->prepare($inserir);
					
					$stmt->bindParam(':email', $email);
					$stmt->bindParam(':senha', $senha);
					
					$insertado = $stmt->execute();
					
					if ($insertado) {
						echo '<script> alert("Insert successful!") </script>';
					} else {
						echo '<script> alert("Insert not successful!") </script>';
					}
					
				}
					
				?>
				<form action="inserts_updates_deletes.php" method="POST">
					<?php
						
					$consultar = 'SELECT * FROM usuarios';
					$stmt = $pdo->query($consultar);
					
					if ($stmt->rowCount() >= 0) {
						$exteriorizar = $stmt->fetchAll();
					} else {
						$exteriorizar = Array();
					}

					foreach ($exteriorizar as $externar):
						
					?>
					<tr>
						<input type="hidden" name="id" value="<?php echo $externar['id']; ?>">
						<td> <input type="email" name="email" value="<?php echo $externar['email']; ?>" placeholder="E-mail" required> </td>
						<td> <input type="password" name="senha" value="<?php echo $externar['senha']; ?>" placeholder="Senha" required> </td>
						<td> <button class="inserir">Inserir</button> <button class="atualizar" type="submit" name="atualizar">Atualizar</button> <button class="deletar" type="submit" name="deletar">Deletar</button> </td>
					</tr>
					<?php
					endforeach;
					?>
				</form>
				<?php
				
				if (isset($_POST['atualizar'])) {
					
					$id = $_POST['id'];
					$email = $_POST['email'];
					$senha = $_POST['senha'];
					
					$atualizar = 'UPDATE usuarios SET email = :email, senha = :senha WHERE id = :id';
					$stmt = $pdo->prepare($atualizar);
					
					$stmt->bindParam(':id', $id);
					$stmt->bindParam(':email', $email);
					$stmt->bindParam(':senha', $senha);
					
					$remodelado = $stmt->execute();
					
					if ($remodelado) {
						echo '<script> alert("Update successful!") </script>';
					} else {
						echo '<script> alert("Update not successful!") </script>';
					}
					
				} else if (isset($_POST['deletar'])) {
					
					$id = $_POST['id'];
					
					$deletar = 'DELETE FROM usuarios WHERE id = :id';
					$stmt = $pdo->prepare($deletar);
					
					$stmt->bindValue(':id', $id);
					
					$expulsar = $stmt->execute();
					
					if ($expulsar) {
						echo "<script> alert('Delete successful!') </script>";
					} else {
						echo "<script> alert('Delete not successful!') </script>";
					}
					
				}
				
				?>
			</tr>
		</table>
		<br> <br> <br>
	</div>
</body>
</html>



