<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'people';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $password, $options);

$peopleAll = ['person1', 'person2', 'person3'];

foreach ($peopleAll as $peopleQuery) {
	
	$query = 'SELECT * FROM people WHERE person = :peopleQuery';
	$stmt = $pdo->prepare($query);
	
	$stmt->bindValue(':peopleQuery', $peopleQuery);
	
	$stmt->execute();
	
	if ($stmt->rowCount() > 0) {
		$personsAll[] = $peopleQuery;
	}

}

if (isset($personsAll)) {
	
	foreach ($personsAll as $peopleQuery) {
		echo "<script> alert('{$peopleQuery} has already been inserted into the database') </script>";
	}
	
}

if (empty($personsAll)) {
	
	foreach ($peopleAll as $peopleInsert) {
	
		$inserts = 'INSERT INTO people (person) VALUES (:peopleInsert)';
		$stmt = $pdo->prepare($inserts);
		
		$stmt->bindValue(':peopleInsert', $peopleInsert);
		
		$stmt->execute();

		echo "<script> alert('{$peopleInsert} has been inserted the database') </script>";

	}
	
}

?>
