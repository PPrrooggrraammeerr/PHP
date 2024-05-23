<?php

session_start ();

if (isset($_SESSION['email_session'])) {
	echo '<script> alert("Login successful with session!") </script>';
	echo '<a class="sair" href="sair.php">Sair</a>';
} else {
	echo '<script> alert("Login not successful with session!") </script>';
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessões</title>
	<?php
	echo '<style>
		.sair {
			display: inline-block;
			padding: 10px 20px;
			background-color: #0056b3;
			color: white;
			text-decoration: none;
			border: 2px solid #0056b3;
			border-radius: 5px;
			transition: background-color 0.3s, border-color 0.3s, color 0.3s;
			font-size: 16px;
			font-weight: bold;
			cursor: pointer;
		}

		.sair:hover,
		.sair:focus {
			background-color: #004494;
			border-color: #004494;
		}

		.sair:active {
			background-color: #00336b;
			border-color: #00336b;
		}
	</style>'
	?>
</head>
</body>
</html>