<?php

require 'connect.php';

class pedido_almoco {

    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function id_pedir_almoco($email) {

        $sql = 'SELECT id FROM usuarios_serenatto WHERE email = :email';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':email', $email);

        $result = $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $key = $stmt->fetch(PDO::FETCH_ASSOC);
            return $key['id'];

        }

    }

    public function enviar_pedido_almoco($id_usuario, $id_pedido_almoco) {

        $sql = 'INSERT INTO pedidos_almoco (id_usuario, id_pedido_almoco) VALUES (:id_usuario, :id_pedido_almoco)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_pedido_almoco', $id_pedido_almoco);
        
        return $stmt->execute();

    }

    public function deletar_pedido_almoco($id) {

        $sql = 'DELETE FROM pedidos_almoco WHERE id_pedido_almoco = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->rowCount() > 0;

    }

}

?>