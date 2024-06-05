<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funções e Classes</title>
</head>
<body>
    <form action="all_tables_with_basic_mathematical_operations.class.php" method="POST">
		<label>Type the operation (+, -, *, /) you want to perform:</label>
		<input type="text" name="operations" placeholder="+, -, *, /" required><br><br>
		<label>First number:</label>
		<input type="number" name="first_number" placeholder="First number" required><br><br>
		<label>Second number:</label>
		<input type="number" name="second_number" placeholder="Second number" required><br><br>
		<button type=submit name="calculate">Calculate</button>
	</form>
</body>
</html>

<?php

if (isset($_POST['calculate'])) {
	
	$first_number = $_POST['first_number'];
	$second_number = $_POST['second_number'];
	
	echo ($first_number+$second_number);
	
}

?>