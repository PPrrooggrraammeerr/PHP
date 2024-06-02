<?php

include 'registros.class.php';

$registros = new registros($pdo);
$buscar_todos_os_registros = $registros->buscar_todos_os_registros();

if ($buscar_todos_os_registros) {

    $registros->apagar_todos_os_registros();
    header('Location: index.php');
    exit;

} else {

	$file_json = 'lista_de_registros.json';

	$data_json = file_get_contents($file_json);

	$json_data = json_decode($data_json, true);

	$criar_registros = 'INSERT INTO registros (registro) VALUES (:registro)';
	$stmt = $pdo->prepare($criar_registros);

	foreach ($json_data['registros'] as $registro) {

	    $stmt->bindParam(':registro', $registro);

	    $stmt->execute();

	}

	header('Location: registros.php');
	exit;

}

?>

