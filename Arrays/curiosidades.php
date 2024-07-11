<!DOCTYPE html>
<html>
<head>
    <title>Curiosidades</title>
</head>
<style type="text/css">
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
<body>
    <h2>Curiosidades sobre:</h2>
    <hr>
    <form method="GET">
        <div>
            <button name="CPF"><b>CPF</b></button>
        </div>
        <div>
            <button name="DDD"><b>DDD</b></button>
        </div>
    </form>
</body>
</html>
<?php

if (isset($_GET['CPF'])) {

    echo '<hr>';
    include 'CPF.php';

} elseif (isset($_GET['DDD'])) {
    
    echo '<hr>';
    include 'DDD.php';

}

?>