<?php

require 'connect.php';
require 'repositories/cardapio_cafe.class.php';
require 'repositories/cardapio_almoco.class.php';

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
} elseif (!isset($_SESSION['senha'])) {
    header('Location: index.php');
    exit;
} else {

    $time_page = 3600;

    if (isset($_SESSION['login_time'])) {

        $time_past = time() - $_SESSION['login_time'];

        if ($time_past >= $time_page) {
            header('Location: sair.php');
            exit;
        }

    }

    $_SESSION['login_time'] = time();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/administrador.css">
    <link rel="stylesheet" href="styles/form.css">
    <?php /* echo '<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="images/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">'; */ ?>
    <title>Serenatto - Cadastrar Produto</title>
</head>
<body>
    <main>
        <section class="container-admin-banner">
            <img src="images/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
            <h1>Cadastro de Produtos</h1>
            <img class= "ornaments" src="images/ornaments-coffee.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form action="cadastrar_produto.php" method="POST" enctype="multipart/form-data">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>
                <div class="container-radio">
                    <div>
                        <label for="cafe">Café</label>
                        <input type="radio" id="cafe" name="tipo" value="Café" checked>
                    </div>
                    <div>
                        <label for="almoco">Almoço</label>
                        <input type="radio" id="almoco" name="tipo" value="Almoço">
                    </div>
                </div>
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" required>
                <label for="preco">Preço</label>
                <input type="text" id="preco" name="preco" placeholder="Digite uma descrição" required>
                <label for="imagem">Envie uma imagem do produto</label>
                <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">
                <input type="submit" name="cadastro" class="botao-cadastrar" value="Cadastrar produto"/>
            </form>
            
        </section>
    </main>
    <?php /* echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="JavaScript/index.js"></script>'; */ ?>
</body>
</html>
<?php

    if (isset($_POST['cadastro'])) {

        if (isset($_POST['tipo'])) {

            $nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];

            if (isset($_FILES['imagem'])) {

                $imagem_temporaria = $_FILES['imagem']['tmp_name'];
                $nome_imagem = basename($_FILES['imagem']['name']);
                $caminho_imagem = 'images/' . $nome_imagem;

                if (move_uploaded_file($imagem_temporaria, $caminho_imagem)) {

                } else {
                    echo '<script> alert("Error uploaded file!") </script>';
                    echo "<meta http-equiv=refresh content='0;URL=./cadastrar_produto.php'>";
                }

            } else {
                $caminho_imagem = '';
            }

            if ($tipo === 'Café') {

                $cardapio_cafe = new cardapio_cafe($pdo);
             
                if ($cardapio_cafe->cadastrar_cafe($nome, $tipo, $descricao, $preco, $caminho_imagem)) {
                    echo '<script> alert("Product cadastred with successful!") </script>';
                    echo "<meta http-equiv=refresh content='0;URL=./administrador.php'>";
                } else {
                    echo '<script> alert("Product cadastred not successful!") </script>';
                    echo "<meta http-equiv=refresh content='0;URL=./cadastrar_produto.php'>";
                }

            } elseif ($tipo === 'Almoço') {

                $cardapio_cafe = new cardapio_almoco($pdo);
             
                if ($cardapio_cafe->cadastrar_almoco($nome, $tipo, $descricao, $preco, $caminho_imagem)) {
                    echo '<script> alert("Product cadastred with successful!") </script>';
                    echo "<meta http-equiv=refresh content='0;URL=./administrador.php'>";
                } else {
                    echo '<script> alert("Product cadastred not successful!") </script>';
                    echo "<meta http-equiv=refresh content='0;URL=./cadastrar_produto.php'>";
                }

            }

        }

    }

}

?>