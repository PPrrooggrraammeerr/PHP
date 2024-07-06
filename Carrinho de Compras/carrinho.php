<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrinho de Compras</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
</head>
<body>
	<h2>Carrinho de Compras</h2>
	<div>
		<div>
			<br>
			<h3>Todos os Produtos:</h3>
            <br><hr>
		</div>
		<div>
			<?php
			if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
				foreach ($_SESSION['carrinho'] as $categoria => $produtos) {
				    foreach ($produtos as $key => $value) {
			?>
			<p>
				<br>
				<b>Nome do Produto:</b> <?php echo $value['produto'];?><br>
				<b>Preço do Produto:</b> <?php echo $value['preco'];?>,00<br>
				<b>Quantidade de Produtos:</b> <?php echo $value['quantidade'];?><br>
                <b>Total de Produtos:</b> <?php echo $value['quantidade'] * $value['preco'];?>,00<br>
                <br><hr>
			</p>
            <?php
                    }
                }
            } else {
            	echo '<script> alert("O Carrinho de Compras não possui nenhum Produto!") </script>';
            }
            ?>
		</div>
	</div>
</body>
</html>