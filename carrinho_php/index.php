<?php

session_start();

require 'db/connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carrinho de Compras PHP</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		h2.title {
			font-family: Arial, Helvetica, sans-serif;
			background-color: #069;
			width: 100%;
			padding: 20px;
			text-align: center;
			color: white;
		}

		.carrinho-container {
			display: flex;
			margin-top: 10px;
		}

		.produto {
			width: 33.3%;
			padding: 0 30px;
		}

		.produto img {
			max-width: 100%;
		}

		.produto a {
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
			display: block;
			width: 100;
			padding: 10px;
			color: white;
			background-color: #5fb382;
		    text-align: center;
		    text-decoration: none;
		}
	</style>
</head>
<body>
    <h2 class="title">Carrinho com PHP</h2>
    <div class="carrinho-container">
	<?php

	$items = array(['nome' => 'Produto1', 'imagem' => 'item1.png', 'preco' => '200'],
		['nome' => 'Produto2', 'imagem' => 'item2.png', 'preco' => '300'],
		['nome' => 'Produto3', 'imagem' => 'item3.png', 'preco' => '400']);

	foreach ($items as $key => $value) {

	?>
	    <div class="produto">
	    	<img src="images/<?php echo $value['imagem'];?>">
	    	<a href="?adicionar=<?php echo $key;?>">Adicionar ao Carrinho!</a>
	    </div>
	<?php

	}

	?>
    </div>
    <?php

    if (isset($_GET['adicionar'])) {
    	
    	$idProduto = (int) $_GET['adicionar'];
    	
    	if (isset($items[$idProduto])) {

    		if (isset($_SESSION['carrinho_compras'][$idProduto])) {
    			$_SESSION['carrinho_compras'][$idProduto]['quantidade']++;
    		} else {
    			$_SESSION['carrinho_compras'][$idProduto] = array('quantidade' => 1, 'nome' => $items[$idProduto]['nome'], 'preco' => $items[$idProduto]['preco']);  
    		}

    		foreach ($_SESSION['carrinho_compras'] as $key => $value) {

		        $nome_produto = $value['nome'];
		        $preco_produto = $value['preco'];

		        $sql = "INSERT INTO produtos_carrinho (nome_produto, preco_produto) VALUES (:nome_produto, :preco_produto)";
		        $stmt = $pdo->prepare($sql);

		        $stmt->bindParam(':nome_produto', $nome_produto);
		        $stmt->bindParam(':preco_produto', $preco_produto);

		        $stmt->execute();

		    }

    		echo '<script>alert("Produto adicionado ao Carrinho!")</script>';
    		echo '<script>window.location.href="carrinho_compras.php"</script>';
    		
    	} else {
            echo '<script>alert("Product not found! Não adicionado ao Carrinho!")</script>';
    	}

    }

    ?>
</body>
</html>