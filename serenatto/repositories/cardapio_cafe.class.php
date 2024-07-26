<?php

require 'connect.php';

class cardapio_cafe {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo; 
    }

    public function verificar_cafe() {

    	$cardapio_cafe = [
		    ['cafe' => 'Café Cremoso', 'descricao' => 'Café cremoso irresistivelmente suave e que envolve seu paladar', 'preco' => '5.00', 'imagem' => 'images/cafe-cremoso.jpg'],
		    ['cafe' => 'Café com Leite', 'descricao' => 'A harmonia perfeita do café e do leite, uma experiência reconfortante', 'preco' => '2.00', 'imagem' => 'images/cafe-com-leite.jpg'],
		    ['cafe' => 'Cappuccino', 'descricao' => 'Café suave, leite cremoso e uma pitada de sabor adocicado', 'preco' => '7.00', 'imagem' => 'images/cappuccino.jpg'],
		    ['cafe' => 'Café Gelado', 'descricao' => 'Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo', 'preco' => '3.00', 'imagem' => 'images/cafe-gelado.jpg']
		];

        foreach ($cardapio_cafe as $key) {
		    $cafe = $key['cafe'];
		    $descricao = $key['descricao'];
		    $preco = $key['preco'];
		    $imagem = $key['imagem'];
		    $sql = 'SELECT * FROM cardapio_cafe WHERE cafe=:cafe AND descricao=:descricao AND preco=:preco AND imagem=:imagem';
		    $stmt = $this->pdo->prepare($sql);
		    $stmt->bindParam(':cafe', $cafe);
		    $stmt->bindParam(':descricao', $descricao);
		    $stmt->bindParam(':preco', $preco);
		    $stmt->bindParam(':imagem', $imagem);
		    $stmt->execute();

		    if ($stmt->rowCount() > 0) {

		    } else {
		        foreach ($cardapio_cafe as $key) {
		            $cafe = $key['cafe'];
		            $descricao = $key['descricao'];
		            $preco = $key['preco'];
		            $imagem = $key['imagem'];
		            $sql = 'INSERT INTO cardapio_cafe (cafe, descricao, preco, imagem) VALUES (:cafe, :descricao, :preco, :imagem)';
		            $stmt = $this->pdo->prepare($sql);
		            $stmt->bindParam(':cafe', $cafe);
		            $stmt->bindParam(':descricao', $descricao);
		            $stmt->bindParam(':preco', $preco);
		            $stmt->bindParam(':imagem', $imagem);
		            $stmt->execute();
		        }
		    }
		}
    }

}

?>