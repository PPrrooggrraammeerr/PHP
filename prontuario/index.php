<?php

require 'settings.php';

$buscar = false;
$valor = "";

if (isset($_GET['valorBusca'])) {

    $buscar = true;

    if ($_GET['valorBusca'] != "") {
        $valor = $_GET['valorBusca'];
    }

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<title>Clínica Veterinária</title>
</head>
<body>
	<form id="area-busca" action="index.php" method="get">
        <input type="text" name="valorBusca" placeholder="Informe o nome do animal:">
        <button>Buscar</button>
    </form>
    <section id="resultados">
        <?php

        if ($buscar) {

            $animalView = new AnimalView();

            if ($valor == "") {
                $animalView->ExibirTodosAnimais();
            } else {
                $animalView->BuscarPeloNome($valor);
            }

        }

        ?>
    </section>
</body>
</html>