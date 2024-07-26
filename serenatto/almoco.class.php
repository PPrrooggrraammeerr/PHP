<?php

require 'connect.php';

class almoco {

    private int $id;
    private string $prato;
    private string $descricao;
    private float $preco;
    private string $imagem;

    public function __construct($pdo, int $id, string $prato, string $descricao, float $preco, string $imagem) {
    	$this->pdo = $pdo;
        $this->id = $id;
        $this->prato = $prato;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }

    public function getId(): int {
    	return $this->id;
    }

    public function getPrato(): string {
    	return $this->prato;
    }

    public function getDescricao(): string {
    	return $this->descricao;
    }

    public function getPreco(): float {
    	return $this->preco;
    }

    public function getImagem(): string {
    	return $this->imagem;
    }

}

?>