<?php

$estados_brasileiros = [
    'Acre',
    'Alagoas',
    'Amapá',
    'Amazonas',
    'Bahia',
    'Ceará',
    'Distrito Federal',
    'Espírito Santo',
    'Goiás',
    'Maranhão',
    'Mato Grosso',
    'Mato Grosso do Sul',
    'Minas Gerais',
    'Pará',
    'Paraíba',
    'Paraná',
    'Pernambuco',
    'Piauí',
    'Rio de Janeiro',
    'Rio Grande do Norte',
    'Rio Grande do Sul',
    'Rondônia',
    'Roraima',
    'Santa Catarina',
    'São Paulo',
    'Sergipe',
    'Tocantins'
];

$siglas_estados_brasileiros = [
    'AC',
    'AL',
    'AP',
    'AM',
    'BA',
    'CE',
    'DF',
    'ES',
    'GO',
    'MA',
    'MT',
    'MS',
    'MG',
    'PA',
    'PB',
    'PR',
    'PE',
    'PI',
    'RJ',
    'RN',
    'RS',
    'RO',
    'RR',
    'SC',
    'SP',
    'SE',
    'TO'
];

?>
<!DOCTYPE html>
<html>
<head>
    <title>array simples</title>
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
                <?php foreach ($siglas_estados_brasileiros as $sigla_estado_brasileiro) {
                    echo $sigla_estado_brasileiro;
                    echo '<hr>';
                }
                ?>
                </td>
                <td>
                <hr>
                <?php
                foreach ($estados_brasileiros as $estado_brasileiro) {
                    echo $estado_brasileiro;
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
                foreach ($estados_brasileiros as $estado_brasileiro) {
                    echo $estado_brasileiro;
                    echo '<hr>';
                }
                ?>
                </td>
                <td>
                <hr>
                <?php
                foreach ($siglas_estados_brasileiros as $sigla_estado_brasileiro) {
                    echo $sigla_estado_brasileiro;
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