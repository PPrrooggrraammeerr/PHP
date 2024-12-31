<?php

class AnimalView {

	function ExibirTodosAnimais() {

		$animalController = new AnimalController();
		$listaTodosAnimais = $animalController->Listar();

		for($i = 0; $i < count($listaTodosAnimais); $i++) {

		    echo "<div class='caixaAnimal'>
			            <a href='atendimento.php'>
			                <img src='images/" . $listaTodosAnimais[$i]->Nome . ".png'>    
			                <div>
			                    <h1>" . $listaTodosAnimais[$i]->Nome . "</h1>
			                    <p>" . $listaTodosAnimais[$i]->Especie->Nome . "</p>
			                </div>
			            </a>
				    </div>";

		}

	}

	function BuscarPeloNome($nome) {

		$animalController = new AnimalController();
		$listaAnimaisComEsteNome = $animalController->BuscarPeloNome($nome);

        if (count($listaAnimaisComEsteNome) == 0) {
        	echo "<p>Não existe um animal registrado com este nome!</p>";
        } else {

			for($i = 0; $i < count($listaAnimaisComEsteNome); $i++) {

			    echo "<div class='caixaAnimal'>
				            <a href='atendimento.php'>
				                <img src='images/" . $listaAnimaisComEsteNome[$i]->Nome . ".png'>    
				                <div>
				                    <h1>" . $listaAnimaisComEsteNome[$i]->Nome . "</h1>
				                    <p>" . $listaAnimaisComEsteNome[$i]->Especie->Nome . "</p>
				                </div>
				            </a>
					    </div>";

			}

		}

	}
	
}

?>