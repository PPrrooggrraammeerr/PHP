<?php

$estados_brasileiros = [
    'AC' => 'Acre',
    'AL' => 'Alagoas',
    'AP' => 'Amapá',
    'AM' => 'Amazonas',
    'BA' => 'Bahia',
    'CE' => 'Ceará',
    'DF' => 'Distrito Federal',
    'ES' => 'Espírito Santo',
    'GO' => 'Goiás',
    'MA' => 'Maranhão',
    'MT' => 'Mato Grosso',
    'MS' => 'Mato Grosso do Sul',
    'MG' => 'Minas Gerais',
    'PA' => 'Pará',
    'PB' => 'Paraíba',
    'PR' => 'Paraná',
    'PE' => 'Pernambuco',
    'PI' => 'Piauí',
    'RJ' => 'Rio de Janeiro',
    'RN' => 'Rio Grande do Norte',
    'RS' => 'Rio Grande do Sul',
    'RO' => 'Rondônia',
    'RR' => 'Roraima',
    'SC' => 'Santa Catarina',
    'SP' => 'São Paulo',
    'SE' => 'Sergipe',
    'TO' => 'Tocantins'
];

$siglas_estados_brasileiros = [
    'Acre' => 'AC',
    'Alagoas' => 'AL',
    'Amapá' => 'AP',
    'Amazonas' => 'AM',
    'Bahia' => 'BA',
    'Ceará' => 'CE',
    'Distrito Federal' => 'DF',
    'Espírito Santo' => 'ES',
    'Goiás' => 'GO',
    'Maranhão' => 'MA',
    'Mato Grosso' => 'MT',
    'Mato Grosso do Sul' => 'MS',
    'Minas Gerais' => 'MG',
    'Pará' => 'PA',
    'Paraíba' => 'PB',
    'Paraná' => 'PR',
    'Pernambuco' => 'PE',
    'Piauí' => 'PI',
    'Rio de Janeiro' => 'RJ',
    'Rio Grande do Norte' => 'RN',
    'Rio Grande do Sul' => 'RS',
    'Rondônia' => 'RO',
    'Roraima' => 'RR',
    'Santa Catarina' => 'SC',
    'São Paulo' => 'SP',
    'Sergipe' => 'SE',
    'Tocantins' => 'TO'
];

?>
<!DOCTYPE html>
<html>
<head>
    <title>array associativo</title>
    <style type="text/css">
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            gap: 4px;
        }

        td {
            padding-left: 4px;
            padding-right: 4px;
        }
    </style>
</head>
<body>
    <h2>Siglas e Estados | Estados e Siglas</h2>
    <div class="container">
        <div>
        <table border="1px">
            <tr>
                <th>Sigla</th>
                <th>Estado</th>
            </tr>
            <tr>
                <td>
                <hr>
                <?php foreach ($estados_brasileiros as $key => $estado_brasileiro) {
                    echo $key;
                    echo '<hr>';
                }
                ?>
                </td>
                <td>
                <hr>
                <?php
                foreach ($siglas_estados_brasileiros as $key => $siglas_estado_brasileiro) {
                    echo $key;
                    echo '<hr>';
                }
                ?>
                </td>
            </tr>
        </table>
        </div>
        <div>
        <table border="1px">
            <tr>
                <th>Estado</th>
                <th>Sigla</th>
            </tr>
            <tr>
                <td>
                <hr>
                <?php
                foreach ($siglas_estados_brasileiros as $key => $sigla_estado_brasileiro) {
                    echo $key;
                    echo '<hr>';
                }
                ?>
                </td>
                <td>
                <hr>
                <?php 
                foreach ($estados_brasileiros as $key => $estado_brasileiro) {
                    echo $key;
                    echo '<hr>';
                }
                ?>
                </td>
            </tr>
        </table>
        </div>
    </div>
</body>
</html>