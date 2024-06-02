<?php

include 'registros.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	
	$opcao_de_registro = $_GET['opcao_de_registro'];
	if (isset($_GET['funcao_registro'])) {
        $funcao_registro = $_GET['funcao_registro'];
	} else {
		$funcao_registro = null;
	}
	
	$registros = new registros($pdo);

	if ($opcao_de_registro === 'criar_um_registro') {
		$registro_criado = $registros->criar_um_registro();
        if ($registro_criado) {
            echo '<script> alert("Register created with successful!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=registros.php'>";
        } else {
            echo '<script> alert("Register not successful!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=registros.php'>";
        }
	} else if ($opcao_de_registro === 'apagar_um_registro') {
		$registro_apagado = $registros->apagar_um_registro();
        if ($registro_apagado) {
            echo '<script> alert("Register deleted with successful!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=registros.php'>";
        } else {
            echo '<script> alert("Register not deleted!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=registros.php'>";
        }
	} else if ($opcao_de_registro === 'buscar_um_registro') {
		$registro_encontrado = $registros->buscar_um_registro();
        if ($registro_encontrado) {
            $registro = $registro_encontrado['registro'];
            echo "<script> alert('$registro') </script>";
            echo "<meta http-equiv=refresh content='0;URL=registros.php'>";
        } else {
            echo '<script> alert("Register not found!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=registros.php'>";
        }
	} else if ($opcao_de_registro === 'buscar_todos_os_registros') {
        $registros_encontrados = $registros->buscar_todos_os_registros();
        if ($registros_encontrados) {
            foreach ($registros_encontrados as $mostrar_cada_registro) {
                echo $mostrar_cada_registro['registro'];
                echo "<br>";
            }
            echo "<meta http-equiv=refresh content='10;URL=registros.php'>";
        }
	}
	
}

?>