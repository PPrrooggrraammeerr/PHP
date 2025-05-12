<?php

require 'connect.php';

class lista_pedidos {

    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function id_usuario($email) {

        $sql = 'SELECT id FROM usuarios_serenatto WHERE email = :email';
		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':email', $email);

		$result = $stmt->execute();

        if ($stmt->rowCount() > 0) {

		    $key = $stmt->fetch(PDO::FETCH_ASSOC);
            return $key['id'];

        }

    }

    public function relatorio_pedidos($id_usuario) {

        $sql = "SELECT 
                    'Café' AS tipo_pedido,
                    cafe.cafe AS item,
                    cafe.descricao,
                    cafe.preco,
                    cafe.imagem
                FROM pedidos_cafe pedido_cafe
                JOIN usuarios_serenatto usuario ON pedido_cafe.id_usuario = usuario.id
                JOIN cardapio_cafe cafe ON pedido_cafe.id_pedido_cafe = cafe.id
                WHERE pedido_cafe.id_usuario = :id_usuario

                UNION ALL

                SELECT 
                    'Almoço' AS tipo_pedido,
                    prato.prato AS item,
                    prato.descricao,
                    prato.preco,
                    prato.imagem
                FROM pedidos_almoco pedido_almoco
                JOIN usuarios_serenatto usuario ON pedido_almoco.id_usuario = usuario.id
                JOIN cardapio_almoco prato ON pedido_almoco.id_pedido_almoco = prato.id
                WHERE pedido_almoco.id_usuario = :id_usuario";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id_usuario', $id_usuario);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}