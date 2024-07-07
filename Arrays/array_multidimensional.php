<?php

$siglas_e_estados_brasileiros = [
    ['sigla' => 'AC', 'estado' => 'Acre'],
    ['sigla' => 'AL', 'estado' => 'Alagoas'],
    ['sigla' => 'AP', 'estado' => 'Amapá'],
    ['sigla' => 'AM', 'estado' => 'Amazonas'],
    ['sigla' => 'BA', 'estado' => 'Bahia'],
    ['sigla' => 'CE', 'estado' => 'Ceará'],
    ['sigla' => 'DF', 'estado' => 'Distrito Federal'],
    ['sigla' => 'ES', 'estado' => 'Espírito Santo'],
    ['sigla' => 'GO', 'estado' => 'Goiás'],
    ['sigla' => 'MA', 'estado' => 'Maranhão'],
    ['sigla' => 'MT', 'estado' => 'Mato Grosso'],
    ['sigla' => 'MS', 'estado' => 'Mato Grosso do Sul'],
    ['sigla' => 'MG', 'estado' => 'Minas Gerais'],
    ['sigla' => 'PA', 'estado' => 'Pará'],
    ['sigla' => 'PB', 'estado' => 'Paraíba'],
    ['sigla' => 'PR', 'estado' => 'Paraná'],
    ['sigla' => 'PE', 'estado' => 'Pernambuco'],
    ['sigla' => 'PI', 'estado' => 'Piauí'],
    ['sigla' => 'RJ', 'estado' => 'Rio de Janeiro'],
    ['sigla' => 'RN', 'estado' => 'Rio Grande do Norte'],
    ['sigla' => 'RS', 'estado' => 'Rio Grande do Sul'],
    ['sigla' => 'RO', 'estado' => 'Rondônia'],
    ['sigla' => 'RR', 'estado' => 'Roraima'],
    ['sigla' => 'SC', 'estado' => 'Santa Catarina'],
    ['sigla' => 'SP', 'estado' => 'São Paulo'],
    ['sigla' => 'SE', 'estado' => 'Sergipe'],
    ['sigla' => 'TO', 'estado' => 'Tocantins']
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>array multidimensional</title>
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
            <?php 
            foreach ($siglas_e_estados_brasileiros as $sigla_e_estado_brasileiro) {
            ?>
            <tr>
                <td><?php echo $sigla_e_estado_brasileiro['sigla'];?></td>
                <td><?php echo $sigla_e_estado_brasileiro['estado'];?></td>
            </tr>   
            <?php
            }
            ?>
        </table>
        </div>
        <div>
		<table border="1px">
			<tr>
				<th>Estado</th>
				<th>Sigla</th>
			</tr>
			<?php 
			foreach ($siglas_e_estados_brasileiros as $sigla_e_estado_brasileiro) {
			?>
			<tr>
				<td><?php echo $sigla_e_estado_brasileiro['estado'];?></td>
                <td><?php echo $sigla_e_estado_brasileiro['sigla'];?></td>
			</tr>	
			<?php
		    }
		    ?>
		</table>
        </div>
	</div>
</body>
</html>