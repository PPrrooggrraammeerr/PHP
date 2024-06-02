<?php

include 'conexao_registros.php';

class registros {
	
	private $pdo;

	public function __construct($pdo) {

		$this->pdo = $pdo;
		
	}
	
	public function criar_um_registro() {

        if (isset($_GET['funcao_registro'])) {
	        $registro = $_GET['funcao_registro'];
		} else {
			$registro = null;
		};

		$criar_um_registro = 'INSERT INTO registros (registro) VALUES (:registro)';
		$stmt = $this->pdo->prepare($criar_um_registro);
		
		$stmt->bindParam(':registro', $registro);

		return $stmt->execute();
		
	}
	
	public function apagar_um_registro() {

		if (isset($_GET['funcao_registro'])) {
	        $registro = $_GET['funcao_registro'];
		} else {
			$registro = null;
		};
		
		$apagar_um_registro = 'DELETE FROM registros WHERE registro=:registro';
		$stmt = $this->pdo->prepare($apagar_um_registro);
		
		$stmt->bindParam(':registro', $registro);
		
		$stmt->execute();
		return $stmt->rowCount() > 0;
		
	}

	public function apagar_todos_os_registros() {

        $apagar_todos_os_registros = 'DELETE FROM registros';
        $stmt = $this->pdo->prepare($apagar_todos_os_registros);

        $stmt->execute();

	}
	
	public function buscar_um_registro() {
		
		if (isset($_GET['funcao_registro'])) {
	        $registro = $_GET['funcao_registro'];
		} else {
			$registro = null;
		};
		
		$buscar_um_registro = 'SELECT * FROM registros WHERE registro=:registro';
		$stmt = $this->pdo->prepare($buscar_um_registro);
		
		$stmt->bindParam(':registro', $registro);
		
        $stmt->execute();
		
		if ($stmt->rowCount() > 0) {
			return $stmt->fetch();
		} else {
			return Array();
		}
		
	}

    public function buscar_todos_os_registros() {
	
        $buscar_todos_os_registros = 'SELECT * FROM registros';
		$stmt = $this->pdo->prepare($buscar_todos_os_registros);
		
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
	        return $stmt->fetchAll();
		} else {
			return Array();
		}

	}
	
}

?>