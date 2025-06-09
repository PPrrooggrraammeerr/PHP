<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Função date()</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

        .funcao_date {
        	font-family: sans-serif;
        	font-size: 24px;
        	text-align: center;
        	padding: 14px;
        	color: white;
        	background-color: darkblue;
        }

        .dates_forms {
        	font-family: sans-serif;
		    display: flex;
		    flex-direction: column;
		    align-items: center;
		    margin: 10px auto;
		    width: fit-content;
		    padding: 19px;
		    padding-left: 44px;
		    padding-right: 44px;
		    border: 1px solid #ccc;
		    border-radius: 7px;
		  }

        label {
        	font-size: 19px;
        	font-weight: bold;
        	display: block;
        	margin-top: 11px;
        	margin-bottom: 11px;
        }

        input {
            font-size: 17px;
            padding: 8px;
            margin-top: 8px;
            border-radius: 4px;
        }
	</style>
</head>
<body>
    <div>
    	<h2 class="funcao_date">Função date()</h2>
    </div>
    <?php

	$Year = date('Y');
	$year = date('y');

    $Month = date('M');
	$month = date('m');

    $Day = date('D');
	$day = date('d');

	$dateYmd = date('Y-m-d');
	$dateYMd = date('Y-M-d');
	$dateYMD = date('Y-M-D');
	$dateyMd = date('y-M-d');
	$dateyMd = date('y-m-D');
	$dateyMD = date('y-M-D');
	$dateymd = date('y-m-d');

	?>
    <div class="dates_forms">
    	<label>Forms of Year:</label>
    	<input type="text" name="date" value="<?php echo $Year; ?>" readonly></input>
    	<input type="text" name="date" value="<?php echo $year; ?>" disabled=""></input>
    </div>
    <div class="dates_forms">
    	<label>Forms of Month:</label>
    	<input type="text" name="date" value="<?php echo $Month; ?>" disabled=""></input>
    	<input type="text" name="date" value="<?php echo $month; ?>" readonly></input>
    </div>
    <div class="dates_forms">
    	<label>Forms of Day:</label>
    	<input type="text" name="date" value="<?php echo $Day; ?>" readonly></input>
    	<input type="text" name="date" value="<?php echo $day; ?>" disabled=""></input>
    </div>
    <div class="dates_forms">
    	<label>Forms of Date:</label>
    	<input type="text" name="date" value="<?php echo $dateYmd; ?>" disabled></input>
    	<input type="text" name="date" value="<?php echo $dateYMd; ?>" readonly></input>
    	<input type="text" name="date" value="<?php echo $dateYMD; ?>" disabled></input>
    	<input type="text" name="date" value="<?php echo $dateyMd; ?>" disabled></input>
    	<input type="text" name="date" value="<?php echo $dateyMD; ?>" readonly></input>
    	<input type="text" name="date" value="<?php echo $dateymd; ?>" disabled></input>
    </div>
    <div class="dates_forms">
    	<label>Forms of Date standard Brazilian:</label>
    	<input type="text" name="date" value="<?php echo date('d/m/y'); ?>" disabled></input>
    	<input type="text" name="date" value="<?php echo date('d/m/Y'); ?>" readonly></input>
    	<input type="text" name="date" value="<?php echo date('d/M/Y'); ?>" readonly></input>
    	<input type="text" name="date" value="<?php echo date('d/M/y'); ?>" disabled></input>
    </div>
</body>
</html>