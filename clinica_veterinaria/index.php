<?php

require_once('config.php');

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
        <input type="text" name="valorBusca" placeholder="Informe nome do animal">
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
        <!-- <div class="caixaAnimal">
            <a href="atendimento.php">
                <img src="images/brutus.png">    
                <div>
                    <h1>Brutus</h1>
                    <p>Buldog</p>
                </div>
            </a>
        </div>
        <div class="caixaAnimal">
            <a href="atendimento.php">
                <img src="images/flocos.png">    
                <div>
                    <h1>Flocos</h1>
                    <p>Dálmata</p>
                </div>
            </a>
        </div>
        <div class="caixaAnimal">
            <a href="atendimento.php">
                <img src="images/luna.png">    
                <div>
                    <h1>Luna</h1>
                    <p>Tabby Listrado</p>
                </div>
            </a>
        </div>
        <div class="caixaAnimal">
            <a href="atendimento.php">
                <img src="images/meg.png">    
                <div>
                    <h1>Meg</h1>
                    <p>Beagle</p>
                </div>
            </a>
        </div>
        <div class="caixaAnimal">
            <a href="atendimento.php">
                <img src="images/rico.png">    
                <div>
                    <h1>Rico</h1>
                    <p>Californiano</p>
                </div>
            </a>
        </div>
        <div class="caixaAnimal">
            <a href="atendimento.php">
                <img src="images/tico.png">    
                <div>
                    <h1>Tico</h1>
                    <p>Fox Paulistinha</p>
                </div>
            </a>
        </div> -->
    </section>
</body>
</html>