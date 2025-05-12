<?php

require 'connect.php';

class pedido_cafe {

    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function id_pedir_cafe($email) {

        $sql = 'SELECT id FROM usuarios_serenatto WHERE email = :email';
		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':email', $email);

		$result = $stmt->execute();

        if ($stmt->rowCount() > 0) {

		    $key = $stmt->fetch(PDO::FETCH_ASSOC);
            return $key['id'];

        }

    }

    public function enviar_pedido_cafe($id_usuario, $id_pedido_cafe) {

        $sql = 'INSERT INTO pedidos_cafe (id_usuario, id_pedido_cafe) VALUES (:id_usuario, :id_pedido_cafe)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_pedido_cafe', $id_pedido_cafe);
        
        return $stmt->execute();

    }

    public function deletar_pedido_cafe($id) {

        $sql = 'DELETE FROM pedidos_cafe WHERE id_pedido_cafe = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->rowCount() > 0;

    }

}

?>