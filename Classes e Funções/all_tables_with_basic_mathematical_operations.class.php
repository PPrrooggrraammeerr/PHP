<?php

class all_tables_with_basic_mathematical_operations {
	
	function addition_table() {
		
		for ($value = 0; $value <= 10; $value++) {
            echo '<br>';
            for ($number = 0; $number <= 10; $number++) {
                echo "$value + $number = " . ($value + $number) . '<br>';
            }
        }

	}
	
	function subtraction_table() {

		for ($value = 0; $value <= 10; $value++) {
            echo '<br>';
            for ($number = 0; $number <= 10; $number++) {
                echo ($number + $value) . " - $value = " . ($number + $value - $value) . '<br>';
            }
        }

	}
	
	function multiplication_table() {
		
		for ($value = 0; $value <= 10; $value++) {
            echo '<br>';
            for ($number = 0; $number <= 10; $number++) {
                echo "$value * $number = " . ($value * $number) . '<br>';
            }
        }
		
	}
	
	function division_table() {
		
		for ($value = 1; $value <= 10; $value++) {
            echo '<br>';
            for ($number = 1; $number <= 10; $number++) {
                echo ($number * $value) . " / $value = " . ($number * $value / $value) . '<br>';
            }
        }
		
	}
	
}

?>

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
		<button type=submit name="calculate">Call</button>
	</form>
</body>
</html>

<?php

if (isset($_POST['calculate'])) {
	
	$operations = $_POST['operations'];
	
	if ($operations === '+') {
	
	    $show_all_tables = new all_tables_with_basic_mathematical_operations();
        $show_all_tables->addition_table();
		
	} else if ($operations === '-') {
		
		$show_all_tables = new all_tables_with_basic_mathematical_operations();
        $show_all_tables->subtraction_table();
		
	} else if ($operations === '*') {
		
		$show_all_tables = new all_tables_with_basic_mathematical_operations();
        $show_all_tables->multiplication_table();

	} else if ($operations === '/') {
		
		$show_all_tables = new all_tables_with_basic_mathematical_operations();
        $show_all_tables->division_table();
	
	}
	
}

?>
