<?php

session_start();

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
    <title>Serenatto - Login</title>
</head>
<body>
    <main>
    <section class="container-admin-banner">
        <img src="images/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
        <h1>Login Serenatto</h1>
        <img class= "ornaments" src="images/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form action="acessar.php" method="POST">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Digite o seu e-mail" required>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="Digite a sua senha" required>
            <input type="submit" name="acessar" class="botao-cadastrar" value="Entrar"/>
        </form>
    </section>
    </main>
</body>
</html>
<?php

require 'repositories/usuarios.class.php';

if (isset($_POST['acessar'])) {

    if (empty($_POST['email']) and (empty($_POST['senha']))) {
        header('Location: acessar.php');
        exit;
    }

    $email_administrador = 'administrador@serenatto.com.br';
    $senha_administrador = md5('serenatto');

    $verify_user = new usuarios($pdo);

    if ($verify_user->verificar_usuario($_POST['email'], md5($_POST['password']))) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = md5($_POST['password']);
        header('Location: home.php');
        exit;
    } elseif ($verify_user->verificar_administrador($_POST['email'], md5($_POST['password']))) {
        if ($_POST['email'] === $email_administrador and md5($_POST['password']) === $senha_administrador) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['senha'] = $_POST['password'];
            header('Location: administrador.php');
            exit;
        }
    } else {
        echo '<script> alert("Login not successful!") </script>';
        echo '<script> alert("User not cadastred!") </script>';
        echo "<meta http-equiv=refresh content='0;URL=./acessar.php'>";
    }

}

?>