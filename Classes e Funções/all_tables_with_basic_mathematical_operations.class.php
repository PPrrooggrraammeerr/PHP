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
                echo "$value - $number = " . ($value * $number) . '<br>';
            }
        }
		
	}
	
	function division_table() {
		
		for ($value = 1; $value <= 10; $value++) {
            echo '<br>';
            for ($number = 1; $number <= 10; $number++) {
                echo ($number * $value) . " * $value = " . ($number * $value / $value) . '<br>';
            }
        }
		
	}
	
}

$show_all_tables = new all_tables_with_basic_mathematical_operations();
$show_all_tables->addition_table();

$show_all_tables = new all_tables_with_basic_mathematical_operations();
$show_all_tables->subtraction_table();

$show_all_tables = new all_tables_with_basic_mathematical_operations();
$show_all_tables->multiplication_table();

$show_all_tables = new all_tables_with_basic_mathematical_operations();
$show_all_tables->division_table();

?>