<?php

include 'conexao.php';

function inicioPedido($conn, $fabrica, $referencia, $marca, $linkDownload, $dataEnvio, $dataDownload, $deadlineAmostra){
    $sql = "INSERT INTO pedidos (id_fabrica, referencia, marca, linkDownload, dataEnvio, dataDownload, deadlineAmostra) VALUES ('$fabrica', '$referencia', '$marca', '$linkDownload', '$dataEnvio', '$dataDownload', '$deadlineAmostra')";
    $resultado = $conn -> query($sql);
}

?>