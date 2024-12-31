<?php

class AnimalController {

    function Listar() {

        $lista = [];

    	try {

    		$pdo = new PDO('mysql:host=127.0.0.1;dbname=prontuario_vet', 'root', '');

    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    		$cSQL = $pdo->prepare('SELECT cd_animal, nm_animal, cd_especie from animal;');
    		$cSQL->execute();

    		while ($dados = $cSQL->fetch(PDO::FETCH_ASSOC)) {

                $codigo = $dados['cd_animal'];
                $nome = $dados['nm_animal'];
                $codigoEspecie = $dados['cd_especie'];

                $cSQLespecie = $pdo->prepare('SELECT * FROM especie WHERE cd_especie = :cd_especie');
                $cSQLespecie->bindParam(':cd_especie', $codigoEspecie);
                $cSQLespecie->execute();

                $dadosEspecie = $cSQLespecie->fetch(PDO::FETCH_ASSOC);
                $nomeEspecie = $dadosEspecie['nm_especie'];

                $especie = new Especie($codigoEspecie, $nomeEspecie);
                $animal = new Animal($codigo, $nome, $especie);
                
                array_push($lista, $animal);

    		}

            $pdo = null;

    	} catch (PDOException $e) {
    		echo 'Erro: ' . $e->getMessage();
    	}

    	return $lista;
        
    }

    function BuscarPeloNome($nome) {

        $lista = [];

        try {

            $pdo = new PDO('mysql:host=127.0.0.1;dbname=prontuario_vet', 'root', '');

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $cSQL = $pdo->prepare('SELECT cd_animal, nm_animal, cd_especie from animal WHERE nm_animal = :nome;');
            $cSQL->bindParam(':nome', $nome);
            $cSQL->execute();

            while ($dados = $cSQL->fetch(PDO::FETCH_ASSOC)) {

                $codigo = $dados['cd_animal'];
                $nome = $dados['nm_animal'];
                $codigoEspecie = $dados['cd_especie'];

                $cSQLespecie = $pdo->prepare('SELECT * FROM especie WHERE cd_especie = :cd_especie');
                $cSQLespecie->bindParam(':cd_especie', $codigoEspecie);
                $cSQLespecie->execute();

                $dadosEspecie = $cSQLespecie->fetch(PDO::FETCH_ASSOC);
                $nomeEspecie = $dadosEspecie['nm_especie'];

                $especie = new Especie($codigoEspecie, $nomeEspecie);
                $animal = new Animal($codigo, $nome, $especie);
                
                array_push($lista, $animal);

            }

            $pdo = null;

        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }

        return $lista;

    }

}

?>