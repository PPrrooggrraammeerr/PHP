<?php

$DDD_por_regioes_estados_brasileiros_e_siglas = [
    'Norte' => [
        'AC' => ['Acre' => [68]],
        'AP' => ['Amapá' => [96]],
        'AM' => ['Amazonas' => [92, 97]],
        'PA' => ['Pará' => [91, 93, 94]],
        'RO' => ['Rondônia' => [69]],
        'RR' => ['Roraima' => [95]],
        'TO' => ['Tocantins' => [63]],
    ],
    'Nordeste' => [
        'AL' => ['Alagoas' => [82]],
        'BA' => ['Bahia' => [71, 73, 74, 75, 77]],
        'CE' => ['Ceará' => [85, 88]],
        'MA' => ['Maranhão' => [98, 99]],
        'PB' => ['Paraíba' => [83]],
        'PE' => ['Pernambuco' => [81, 87]],
        'PI' => ['Piauí' => [86, 89]],
        'RN' => ['Rio Grande do Norte' => [84]],
        'SE' => ['Sergipe' => [79]],
    ],
    'Centro-Oeste' => [
        'DF' => ['Distrito Federal' => [61]],
        'GO' => ['Goiás' => [62, 64]],
        'MT' => ['Mato Grosso' => [65, 66]],
        'MS' => ['Mato Grosso do Sul' => [67]],
    ],
    'Sudeste' => [
        'ES' => ['Espírito Santo' => [27, 28]],
        'MG' => ['Minas Gerais' => [31, 32, 33, 34, 35, 37, 38]],
        'RJ' => ['Rio de Janeiro' => [21, 22, 24]],
        'SP' => ['São Paulo' => [11, 12, 13, 14, 15, 16, 17, 18, 19]],
    ],
    'Sul' => [
        'PR' => ['Paraná' => [41, 42, 43, 44, 45, 46]],
        'RS' => ['Rio Grande do Sul' => [51, 53, 54, 55]],
        'SC' => ['Santa Catarina' => [47, 48, 49]],
    ],
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Identificação de DDD por Regiões, Estados Brasileiros e Siglas</title>
</head>
<body>
    <div>
    	<h2>Identificação de DDD por Regiões, Estados Brasileiros e Siglas</h2>
    </div>
    <div>
        <?php
        foreach ($DDD_por_regioes_estados_brasileiros_e_siglas as $regioes => $estados_brasileiros_e_siglas) {
            echo "<b>{$regioes}:</b><br>";
            foreach ($estados_brasileiros_e_siglas as $siglas => $estados_brasileiros) {
                foreach ($estados_brasileiros as $estado_brasileiro => $DDD) {
                    echo "<b>{$siglas} - {$estado_brasileiro}: </b>";
                    if ($DDD) {
                        echo implode(', ', $DDD) . '<br>';
                    }
                }
            }
            echo '<hr>';
        }
        ?>
    </dir>
</body>
</html>