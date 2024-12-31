<?php

class Especie {

    public $Codigo;
    public $Nome;

    function __construct($codigo = null, $nome = null) {

        $this->Codigo = $codigo;
        $this->Nome = $nome;
        
    }

}

?>