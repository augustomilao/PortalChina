<?php

include 'conexao.php';

function buscaID($conn){
    $sql = "SELECT id FROM pedidos ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql)->fetch_assoc();
    $a = $result['id'] + 1;
    return $a;
}

function buscaPedidoID($conn, $id){
    $sql = "SELECT * FROM pedidos WHERE  INNER JOIN fabricas ON pedidos.id_fabrica = fabricas.id WHERE id = '$id'";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado;
}

function buscaLink($conn, $id){
    $sql = "SELECT linkDownload FROM pedidos WHERE id = '$id'";
    $result = $conn->query($sql)->fetch_assoc();
    $a = $result['linkDownload'];
    return $a;
}

function inicioPedido($conn, $fabrica, $referencia, $marca, $linkDownload, $dataEnvio, $dataDownload, $deadlineAmostra){
    $sql = "INSERT INTO pedidos (id_fabrica, referencia, marca, linkDownload, dataEnvio, dataDownload, deadlineAmostra) VALUES ('$fabrica', '$referencia', '$marca', '$linkDownload', '$dataEnvio', '$dataDownload', '$deadlineAmostra')";
    $resultado = $conn -> query($sql);
}

function buscaTodosPedidos($conn){
    $sql = "SELECT * FROM pedidos INNER JOIN fabricas ON pedidos.id_fabrica  = fabricas.id";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado;
}

function confirmaDownload($conn, $id){
    $sql = "UPDATE pedidos SET downloadEfetuado = 1 WHERE id = '$id' ";
    $resultado = $conn -> query($sql);
}

?>