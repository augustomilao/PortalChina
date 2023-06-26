<?php
include '../models/pedidos.php';

var_dump($_POST);
echo "<br><br>";
echo $_FILES["imagem"]["tmp_name"];
echo "<br><br>";

$diretorio_upload = '../imagens/' . $_POST['fabrica'] . '/';
$imagem_alvo = $diretorio_upload . $_POST['referencia'] . ".png";

if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem_alvo)) {
    inicioPedido($conn, $_POST['fabrica'], $_POST['referencia'], $_POST['marca'], $_POST['linkDownload'], $_POST['dataEnvio'], $_POST['dataDownload'], $_POST['deadlineAmostra']);
  } else {
    echo "Erro, não deu para enviar o pedido.";
  }

header('Location: ../views/dashboard.php');

?> 