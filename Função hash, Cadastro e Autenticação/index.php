<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Função Hash</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }
        
        h2 {
            margin-top: 19px;
            margin-bottom: 19px;
        }

        form {
            display: flex;
            gap: 9px;
        } 

        button {
            font-size: 19px;
            color: white;
            background-color: red;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            color: darkgrey;
            background-color: darkred; 
        }
    </style>
</head>
<body>
    <h2>Função Hash:</h2>
    <hr>
    <form method="POST">
        <div>
            <button name="MD5"><b>MD5</b></button>
        </div>
        <div>
            <button name="SHA-1"><b>SHA-1</b></button>
        </div>
        <div>
            <button name="bcrypt"><b>Bcrypt</b></button>
        </div>
    </form>
</body>
</html>
<?php

if (isset($_POST['MD5'])) {

    header('Location: md5.php');
    exit;

} elseif (isset($_POST['SHA-1'])) {
    
    header('Location: sha-1.php');
    exit;

} elseif (isset($_POST['bcrypt'])) {

    header('Location: bcrypt.php');
    exit;

}

?>