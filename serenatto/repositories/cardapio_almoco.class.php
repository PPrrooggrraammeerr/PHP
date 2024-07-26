<?php

require 'connect.php';

class cardapio_almoco {
	
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function verificar_almoco() {

        $cardapio_almoco = [
		    ['prato' => 'Bife', 'descricao' => 'Bife, arroz com feijão e uma deliciosa batata frita', 'preco' => '27.90', 'imagem' => 'images/bife.jpg'],
		    ['prato' => 'Filé de peixe', 'descricao' => 'Filé de peixe salmão assado, arroz, feijão verde e tomate', 'preco' => '24.99', 'imagem' => 'images/prato-peixe.jpg'],
		    ['prato' => 'Frango', 'descricao' => 'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante', 'preco' => '23.00', 'imagem' => 'images/prato-frango.jpg'],
		    ['prato' => 'Fettuccine', 'descricao' => 'Prato italiano autêntico da massa do fettuccine com peito de frango grelhado', 'preco' => '22.50', 'imagem' => 'images/fettuccine.jpg']
		];

		foreach ($cardapio_almoco as $key) {
		    $prato = $key['prato'];
		    $descricao = $key['descricao'];
		    $preco = $key['preco'];
		    $imagem = $key['imagem'];
		    $sql = 'SELECT * FROM cardapio_almoco WHERE prato=:prato AND descricao=:descricao AND preco=:preco AND imagem=:imagem';
		    $stmt = $this->pdo->prepare($sql);
		    $stmt->bindParam(':prato', $prato);
		    $stmt->bindParam(':descricao', $descricao);
		    $stmt->bindParam(':preco', $preco);
		    $stmt->bindParam(':imagem', $imagem);
		    $stmt->execute();

		    if ($stmt->rowCount() > 0) {

		    } else {
		        foreach ($cardapio_almoco as $key) {
		            $prato = $key['prato'];
		            $descricao = $key['descricao'];
		            $preco = $key['preco'];
		            $imagem = $key['imagem'];
		            $sql = 'INSERT INTO cardapio_almoco (prato, descricao, preco, imagem) VALUES (:prato, :descricao, :preco, :imagem)';
		            $stmt = $this->pdo->prepare($sql);
		            $stmt->bindParam(':prato', $prato);
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