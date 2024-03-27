<?php

session_start();

if (isset($_GET['send'])) {

    if (!isset($_SESSION['list_names'])) {
        $_SESSION['list_names'] = array();
    }
    
    $_SESSION['list_names'][] = $_GET['get_name'];

    if (count($_SESSION['list_names']) >= 10) {
        session_destroy();
    }

}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$_SESSION and foreach</title>
</head>
<body>
    <form action="index.php" method="GET">
        <h3>Insert name:</h3>
        <input type="text" name="get_name" placeholder="Name" required>
        <br><br>
        <button type="submit" name="send">Send</button>
    </form>
    <br>
    <h3>List of names:</h3>
</body>
</html>
<?php

foreach ($_SESSION['list_names'] as $post_name) {
    echo $post_name . "<br>";
}

?>