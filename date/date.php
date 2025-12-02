<?php

setlocale(LC_TIME, "pt_BR.utf8");

$hour = date('H');

if ($hour < 12) {
	$msg = "Boa tarde!";
} elseif ($hour < 18) {
	$msg = "Boa noite!";
} else {
	$msg = "Boa tarde!";
}

$formats = [
    'Ano (completo)' => 'Y',
    'Ano (abreviado)' => 'y',
    'Mês abreviado' => 'M',
    'Mês numérico' => 'm',
    'Dia abreviado' => 'D',
    'Dia numérico' => 'd',
];

$dateFormats = [
    'ISO 8601 (Y-m-d)' => 'Y-m-d',
    'Y-M-d' => 'Y-M-d',
    'Y-M-D' => 'Y-M-D',
    'y-M-d' => 'y-M-d',
    'y-m-D' => 'y-m-D',
    'y-M-D' => 'y-M-D',
    'y-m-d' => 'y-m-d',
];

$today = strtotime("today");
$natal = strtotime("December 25");
$anoNovo = strtotime((date("Y") + 1) . "-01-01");

$diasNatal = floor(($natal - $today) / 86400);
$diasAnoNovo = floor(($anoNovo - $today) / 86400);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Função date()</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
		
        body {
            font-family: Arial, sans-serif;
            padding: 25px;
            background-color: #f2f2f2;
            color: #222;
        }
		
        .container {
            max-width: 900px;
            margin: auto;
        }
		
        h1 {
            background: #002080;
            color: white;
            padding: 18px;
            text-align: center;
            border-radius: 6px;
        }
		
        .box {
            background: white;
            border: 1px solid #ccc;
            padding: 18px;
            border-radius: 8px;
            margin-top: 20px;
        }
		
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 12px;
        }
		
        input {
            width: 100%;
            padding: 10px;
            margin-top: -9px;
            margin-bottom: 19px;
            border-radius: 4px;
            border: 1px solid #aaa;
            font-size: 17px;
        }
		
        .clock {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            padding: 12px;
            border-radius: 6px;
            background: #ddd;
            margin-top: 10px;
        }

        @media (prefers-color-scheme: dark) {
            body {
                background: #111;
                color: #eee;
            }
            .box {
                background: #222;
                border-color: #555;
            }
            input {
                background: #333;
                color: white;
                border-color: #666;
            }
            h1 {
                background: #000080;
            }
            .clock {
                background: #333;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1><i class="fa-solid fa-calendar"></i> Função date() em PHP</h1>
    <div class="box">
        <h2><i class="fa-solid fa-hand-sparkles"></i> <?php echo $msg; ?></h2>
    </div>
    <div class="box">
        <h3><i class="fa-solid fa-clock"></i> Hora atual (atualiza em tempo real)</h3>
        <div id="clock" class="clock"></div>
    </div>
    <div class="box">
        <h3><i class="fa-solid fa-list"></i> Formatos simples</h3>
		<br>
        <?php foreach ($formats as $texto => $f): ?>
            <label><?php echo $texto; ?></label>
            <input type="text" value="<?php echo date($f); ?>" readonly>
        <?php endforeach; ?>
    </div>
    <div class="box">
        <h3><i class="fa-solid fa-calendar-days"></i> Formatos completos</h3>
		<br>
        <?php foreach ($dateFormats as $texto => $f): ?>
            <label><?php echo $texto; ?></label>
            <input type="text" value="<?php echo date($f); ?>" readonly>
        <?php endforeach; ?>
    </div>
    <div class="box">
        <h3><i class="fa-solid fa-flag"></i> Formato padrão brasileiro</h3>
		<br>
        <label>d/m/Y</label>
        <input type="text" value="<?php echo date('d/m/Y'); ?>" readonly>
        <label>d/m/y</label>
        <input type="text" value="<?php echo date('d/m/y'); ?>" readonly>
        <label>d/M/Y</label>
        <input type="text" value="<?php echo date('d/M/Y'); ?>" readonly>
    </div>
    <div class="box">
        <h3><i class="fa-solid fa-hourglass-half"></i> Contagem para eventos</h3>
		<br>
        <label>Natal</label>
        <input type="text" value="Faltam <?php echo $diasNatal; ?> dias para o Natal!" readonly>
        <label>Ano Novo</label>
        <input type="text" value="Faltam <?php echo $diasAnoNovo; ?> dias para o Ano Novo!" readonly>
    </div>
</div>
<script>
function atualizarRelogio() {
    const agora = new Date();
    const formatado = agora.toLocaleString("pt-BR");
    document.getElementById("clock").innerHTML = formatado;
}
setInterval(atualizarRelogio, 1000);
atualizarRelogio();
</script>
</body>
</html>
