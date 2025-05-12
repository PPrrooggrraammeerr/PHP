<?php

require 'connect.php';
require 'repositories\lista_pedidos.class.php';

Use Dompdf\Dompdf;

include 'dompdf/autoload.inc.php';

session_start();

if (!isset($_SESSION['email'])) {
	header('Location: index.php');
	exit;
} elseif (!isset($_SESSION['senha'])) {
	header('Location: index.php');
	exit;
}

$id_usuarios = new lista_pedidos($pdo);
$buscar_id_usuario = $id_usuarios->id_usuario($_SESSION['email']);

if ($buscar_id_usuario) {

    $id_usuario = $buscar_id_usuario;

    $listar_pedidos = new lista_pedidos($pdo);
    $relatorio_pedidos = $listar_pedidos->relatorio_pedidos($id_usuario);

	$html = '
	<html>
	<head>
	    <style>
	        body {
	            font-family: Arial, sans-serif;
	            margin: 20px;
	            color: #333;
	        }

	        h3 {
	            text-align: center;
	            color: #4CAF50;
	        }

	        .item {
	            border: 1px solid #ddd;
	            padding: 10px;
	            margin-bottom: 10px;
	            border-radius: 5px;
	            background-color: #f9f9f9;
	        }

	        .item p {
	            margin: 5px 0;
	            font-size: 14px;
	        }

	        .label {
	            font-weight: bold;
	            color: #555;
	        }

	        .separator {
	            color: #4CAF50;
	        }

	        hr {
	            border: 0;
	            border-top: 1px solid #ddd;
	            margin: 10px 0;
	        }
	    </style>
	</head>
	<body>
	    <h3>RELATÓRIO ATUALIZADO: PEDIDOS SOLICITADOS / CAFÉ E ALMOÇO</h3>';

    if ($relatorio_pedidos) {
    	foreach ($relatorio_pedidos as $key) {

	        $formatar_preco = number_format((float)$key['preco'], 2, ',', '');

	        $html .= '<div class="item">';
	        $html .= '<p><span class="label">NOME:</span> ' . htmlspecialchars($key['tipo_pedido']) . '</p>';
	        $html .= '<p><span class="label">TIPO:</span> ' . htmlspecialchars($key['item']) . '</p>';
	        $html .= '<p><span class="label">DESCRIÇÃO:</span> ' . htmlspecialchars($key['descricao']) . '</p>';
	        $html .= '<p><span class="label">PREÇO:</span> R$ ' . $formatar_preco . '</p>';
	        $html .= '</div>';

	    }
	}

	$html .= '</body></html>';

    if ($html) {

		$dompdf = new Dompdf();

		$dompdf->loadHtml($html);
		$dompdf->set_option('defaultFont', 'Arial');
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream('relatorio_atualizado_pedidos_cafe_e_almoco.pdf');

	} else {
		echo '<script> alert("Error: downloading PDF") </script>';
	    echo "<meta http-equiv=refresh content='0;URL=./home.php'>";
	}

}

?>