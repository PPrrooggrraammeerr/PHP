<?php

require 'connect.php';

class cafe {

    private int $id;
    private string $cafe;
    private string $descricao;
    private float $preco;
    private string $imagem;

    public function __construct($pdo, int $id, string $cafe, string $descricao, float $preco, string $imagem) {
    	$this->pdo = $pdo;
        $this->id = $id;
        $this->cafe = $cafe;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }

    public function getId(): int {
    	return $this->id;
    }

    public function getCafe(): string {
    	return $this->cafe;
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