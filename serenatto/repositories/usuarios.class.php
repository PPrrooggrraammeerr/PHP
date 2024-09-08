<?php

require 'connect.php';

class usuarios {

    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar_usuario($email, $senha) {

        $sql = "INSERT INTO usuarios_serenatto (email, senha) VALUES (:email, :senha)";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        return $stmt->execute();

    }

    public function verificar_usuario($email, $senha) {

    	$sql = "SELECT * FROM usuarios_serenatto WHERE email = :email AND senha = :senha";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

}

?>