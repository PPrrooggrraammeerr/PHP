<?php

spl_autoload_register(function($nomeClasse) {

    $pastaClasses = 'repositories/';
    
    $possiveisCaminhosPasta = [
        $pastaClasses,
        $pastaClasses . 'models/',
        $pastaClasses . 'views/',
        $pastaClasses . 'controllers/',
    ];

    foreach ($possiveisCaminhosPasta as $possivelCaminhoPasta) {

        $nomeArquivo = $possivelCaminhoPasta . $nomeClasse . '.php';

        if (file_exists($nomeArquivo)) {

        	require_once $nomeArquivo;
        	break;

        }
        
    }

})

?>