<?php 

require 'connect.php';

use Dompdf\Dompdf;

include 'dompdf/autoload.inc.php';

session_start();

$email_administrador = 'administrador@serenatto.com.br';
$senha_administrador = md5('serenatto');

if (!isset($_SESSION['email']) or !isset($_SESSION['senha']) or $_SESSION['email'] != $email_administrador or md5($_SESSION['senha']) != $senha_administrador) {
    header('Location: index.php');
    exit;
} else {

    $sql = 'SELECT cafe AS nome, tipo, descricao, preco FROM cardapio_cafe UNION SELECT prato AS nome, tipo, descricao, preco FROM cardapio_almoco';
    $stmt = $pdo->query($sql);

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
        <h3>RELATÓRIO ATUALIZADO: CARDÁPIO / CAFÉ E ALMOÇO</h3>';

    if ($stmt->rowCount() > 0) {
        $exteriorizar = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exteriorizar as $key) {

            $formatar_preco = number_format((float)$key['preco'], 2, ',', '');

            $html .= '<div class="item">';
            $html .= '<p><span class="label">NOME:</span> ' . htmlspecialchars($key['nome']) . '</p>';
            $html .= '<p><span class="label">TIPO:</span> ' . htmlspecialchars($key['tipo']) . '</p>';
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
    	$dompdf->stream('relatorio_atualizado_cardapio_cafe_e_almoco.pdf');

    } else {
    	echo '<script> alert("Error: downloading PDF") </script>';
        echo "<meta http-equiv=refresh content='0;URL=./administrador.php'>";
    }

}

?>