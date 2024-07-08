<?php

$CPF_por_estados_brasileiros = [
    '111.111.110-11' => [
        'RS' => 'Rio Grande do Sul',
    ],
    '222.222.221-22' => [
        'PA' => 'Pará',
        'AM' => 'Amazonas',
        'AC' => 'Acre',
        'AP' => 'Amapá',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
    ],
    '333.333.332-33' => [
        'DF' => 'Distrito Federal',
        'GO' => 'Goiás',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'TO' => 'Tocantins',
    ],
    '444.444.443-44' => [
        'CE' => 'Ceará',
        'MA' => 'Maranhão',
        'PI' => 'Piauí',
    ],
    '555.555.554.55' => [
        'PE' => 'Pernambuco',
        'RN' => 'Rio Grande do Norte',
        'PB' => 'Paraíba',
        'AL' => 'Alagoas',
    ],
    '666.666.665-66' => [
        'BA' => 'Bahia',
        'SE' => 'Sergipe',
    ],
    '777.777.776-77' => [
        'MG' => 'Minas Gerais',
    ],
    '888.888.887-88' => [
        'RJ' => 'Rio de Janeiro',
        'ES' => 'Espírito Santo',
    ],
    '999.999.998-99' => [
        'SP' => 'São Paulo',
    ],
    '000.000.009-00' => [
        'PR' => 'Paraná',
        'SC' => 'Santa Catarina',
    ],
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Identificação de CPF por Estados Brasileiros e Siglas</title>
</head>
<body>
    <div>
    	<h2>Identificação de CPF por Estados Brasileiros e Siglas</h2>
    </div>
    <div>
        <?php
        foreach ($CPF_por_estados_brasileiros as $CPF => $estados_brasileiros) {
			echo "<b>{$CPF}:</b><br>";
			foreach ($estados_brasileiros as $sigla => $estado_brasileiro) {
			    echo "{$sigla} - {$estado_brasileiro}<br>";
			}
			echo '<hr>';
		}
        ?>
    </dir>
</body>
</html>