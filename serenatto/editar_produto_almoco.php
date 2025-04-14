<?php

session_start();

require 'connect.php';
require 'repositories/cardapio_cafe.class.php';
require 'repositories/cardapio_almoco.class.php';

$email_administrador = 'administrador@serenatto.com.br';
$senha_administrador = md5('serenatto');

if (!isset($_SESSION['email']) or !isset($_SESSION['senha']) or $_SESSION['email'] != $email_administrador or md5($_SESSION['senha']) != $senha_administrador) {
    header('Location: index.php');
    exit;
} else {

    if (isset($_POST['editar'])) {  

        $id = $_POST['id'];
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

                $sql = 'SELECT imagem FROM cardapio_almoco WHERE id = :id';
                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                $stmt->execute();

                $exteriorizar = $stmt->fetch(PDO::FETCH_ASSOC);
                $caminho_imagem = $exteriorizar['imagem'];

            }

        }

        if ($tipo === 'Almoço') {

            $cardapio_almoco = new cardapio_almoco($pdo);

            if ($cardapio_almoco->editar_almoco($id, $nome, $tipo, $descricao, $preco, $caminho_imagem)) {
                echo '<script> alert("Product edited with successful!") </script>';
                echo "<meta http-equiv=refresh content='0;URL=./administrador.php'>";
            } else {
                echo '<script> alert("Product edited not successful!") </script>';
                echo "<meta http-equiv=refresh content='0;URL=./administrador.php'>";
            }

        } elseif ($tipo === 'Café') {

            echo '<script> alert("Product edited not successful!") </script>';
            echo "<meta http-equiv=refresh content='0;URL=./administrador.php'>";
        }

    } elseif (isset($_GET['id'])) {

        $id = intval($_GET['id']);

        if ($id > 0) {

            $sql = 'SELECT * FROM cardapio_almoco WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        
            if ($stmt->rowCount() > 0) {

                $exteriorizar = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <title>Serenatto - Editar Produto</title>
</head>
<body>
    <main>
        <section class="container-admin-banner">
            <img src="images/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
            <h1>Editar Produto</h1>
            <img class= "ornaments" src="images/ornaments-coffee.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form action="editar_produto_almoco.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo ($exteriorizar['id']);?>">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" value="<?php echo ($exteriorizar['prato']);?>" required>
                <div class="container-radio">
                    <div>
                        <label for="cafe">Café</label>
                        <input type="radio" id="cafe" name="tipo" value="Café" <?php if ($exteriorizar['tipo'] === 'Café') {
                            echo 'checked';
                        }?>>
                    </div>
                    <div>
                        <label for="almoco">Almoço</label>
                        <input type="radio" id="almoco" name="tipo" value="Almoço" <?php if ($exteriorizar['tipo'] === 'Almoço') {
                            echo 'checked';
                        }?>>
                    </div>
                </div>
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" value="<?php echo ($exteriorizar['descricao']);?>" required>
                <label for="preco">Preço</label>
                <input type="text" id="preco" name="preco" placeholder="Digite uma descrição" value="<?php echo ($exteriorizar['preco']);?>" required>
                <label for="imagem">Envie uma imagem do produto</label>
                <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">
                <input type="submit" name="editar" class="botao-cadastrar"  value="Editar Produto"/>
            </form>
        </section>
    </main>
    <?php /* echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="JavaScript/index.js"></script>'; */ ?>
</body>
</html>
<?php

            }

        }

    } else {
        echo 'ID not found!';
    }

}

?>