<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
</head>
<body>
    <script>
        function menuCategorias(categoria) {
            var categorias = document.querySelectorAll('.categoria');
            categorias.forEach(function(cat) {
                cat.style.display = 'none';
            });

            var categoriaSelecionada = document.getElementById(categoria);
            categoriaSelecionada.style.display = 'block';

            document.getElementById('categorias-opcoes').style.display = 'none';
            document.getElementById('categorias-menu').textContent = 'Categorias ▼';
        }

        function mostrarCategorias() {
            var categoriasMenu = document.getElementById('categorias-menu');
            var categoriasOpcoes = document.getElementById('categorias-opcoes');
            var categorias = document.querySelectorAll('.categoria');

            if (categoriasOpcoes.style.display === 'block') {
                categoriasOpcoes.style.display = 'none';
                categoriasMenu.textContent = 'Categorias ▼';

                categorias.forEach(function(cat) {
                    cat.style.display = 'none';
                });
            } else {
                categoriasOpcoes.style.display = 'block';
                categoriasMenu.textContent = 'Categorias ▲';
            }
        }
    </script>
    <h2>Produtos</h2>
    <br>
    <div onclick="mostrarCategorias()" id="categorias-menu" class="categorias-menu">Categorias ▼</div>
    <br>
    <div id="categorias-opcoes">
        <a href="#" onclick="menuCategorias('smartphones'); return false;">Smartphones</a>
        <a href="#" onclick="menuCategorias('eletrodomesticos'); return false;">Eletrodomésticos</a>
        <a href="#" onclick="menuCategorias('calcados'); return false;">Calçados</a>
    </div>
    <div id="smartphones" class="categoria">
        <h3>Smartphones</h3>
        <br>
        <div class="produtos">
            <?php

            $smartphones = [
                ['smartphone' => 'Samsung', 'imagem' => 'images/samsung.jpg', 'valor' => '800'],
                ['smartphone' => 'Xiaomi', 'imagem' => 'images/xiaomi.jpg', 'valor' => '1000'],
                ['smartphone' => 'Iphone', 'imagem' => 'images/iphone.jpg', 'valor' => '4000']
            ];

            foreach ($smartphones as $key => $value) {
            ?>
            <div>
                <img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['smartphone']; ?>">
                <a class="adicionar" href="?adicionar_smartphone=<?php echo $key; ?>">Adicionar</a>
            </div>
            <?php
            } ?>
        </div>
    </div>
    <div id="eletrodomesticos" class="categoria">
        <h3>Eletrodomésticos</h3>
        <br>
        <div class="produtos">
            <?php
            
            $eletrodomesticos = [
                ['eletrodomestico' => 'Geladeira', 'imagem' => 'images/geladeira.jpg', 'valor' => '2000'],
                ['eletrodomestico' => 'Fogão', 'imagem' => 'images/fogao.jpg', 'valor' => '1500'],
                ['eletrodomestico' => 'Fritadeira', 'imagem' => 'images/fritadeira.jpg', 'valor' => '500']
            ];

            foreach ($eletrodomesticos as $key => $value) {
            ?>
            <div>
                <img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['eletrodomestico']; ?>">
                <a class="adicionar" href="?adicionar_eletrodomestico=<?php echo $key; ?>">Adicionar</a>
            </div>
            <?php
            } ?>
        </div>
    </div>
    <div id="calcados" class="categoria">
        <h3>Calçados</h3>
        <br>
        <div class="produtos">
            <?php
            
            $calcados = [
                ['calcado' => 'Tênis', 'imagem' => 'images/tenis.jpg', 'valor' => '250'],
                ['calcado' => 'Sapato', 'imagem' => 'images/sapato.jpg', 'valor' => '180'],
                ['calcado' => 'Chinelo', 'imagem' => 'images/chinelo.jpg', 'valor' => '35']
            ];

            foreach ($calcados as $key => $value) {
            ?>
            <div>
                <img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['calcado']; ?>">
                <a class="adicionar" href="?adicionar_calcado=<?php echo $key; ?>">Adicionar</a>
            </div>
            <?php
            } ?>
        </div>
    </div>
</body>
</html>
<?php

if (isset($_GET['adicionar_smartphone'])) {

    $idProduto = (int) $_GET['adicionar_smartphone'];
    
    if (isset($smartphones[$idProduto])) {
        if (isset($_SESSION['carrinho']['smartphone'][$idProduto])) {
            $_SESSION['carrinho']['smartphone'][$idProduto]['quantidade']++;
        } else {
            $_SESSION['carrinho']['smartphone'][$idProduto] = [
                'quantidade' => 1,
                'produto' => $smartphones[$idProduto]['smartphone'],
                'preco' => $smartphones[$idProduto]['valor']
            ];
        }
        echo '<script> alert("Produto adicionado com sucesso ao Carrinho de Compras!") </script>';
        echo "<meta http-equiv=refresh content='0;URL=carrinho.php'>";
    } else {
        echo '<script> alert("Produto não adicionado ao Carrinho de Compras. Motivo: inexistente!") </script>';
    }

} elseif (isset($_GET['adicionar_eletrodomestico'])) {

    $idProduto = (int) $_GET['adicionar_eletrodomestico'];

    if (isset($eletrodomesticos[$idProduto])) {
        if (isset($_SESSION['carrinho']['eletrodomestico'][$idProduto])) {
            $_SESSION['carrinho']['eletrodomestico'][$idProduto]['quantidade']++;
        } else {
            $_SESSION['carrinho']['eletrodomestico'][$idProduto] = [
                'quantidade' => 1,
                'produto' => $eletrodomesticos[$idProduto]['eletrodomestico'],
                'preco' => $eletrodomesticos[$idProduto]['valor']
            ];
        }
        echo '<script> alert("Produto adicionado com sucesso ao Carrinho de Compras!") </script>';
        echo "<meta http-equiv=refresh content='0;URL=carrinho.php'>";
    } else {
        echo '<script> alert("Produto não adicionado ao Carrinho de Compras. Motivo: inexistente!") </script>';
    }

} elseif (isset($_GET['adicionar_calcado'])) {

    $idProduto = (int) $_GET['adicionar_calcado'];

    if (isset($calcados[$idProduto])) {
        if (isset($_SESSION['carrinho']['calcado'][$idProduto])) {
            $_SESSION['carrinho']['calcado'][$idProduto]['quantidade']++;
        } else {
            $_SESSION['carrinho']['calcado'][$idProduto] = [
                'quantidade' => 1,
                'produto' => $calcados[$idProduto]['calcado'],
                'preco' => $calcados[$idProduto]['valor']
            ];
        }
        echo '<script> alert("Produto adicionado com sucesso ao Carrinho de Compras!") </script>';
        echo "<meta http-equiv=refresh content='0;URL=carrinho.php'>";
    } else {
        echo '<script> alert("Produto não adicionado ao Carrinho de Compras. Motivo: inexistente!") </script>';
    }

}

?>