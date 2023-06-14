<?php

include 'conexao.php';

function buscaID($conn){
    $sql = "SELECT id FROM pedidos ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql)->fetch_assoc();
    $a = $result['id'] + 1;
    return $a;
}

function buscaPedidoID($conn, $id){
    $sql = "SELECT * FROM pedidos WHERE id = '$id'";
    $resultado = $conn -> query($sql) -> fetch_assoc();
    return $resultado;
}

function buscaLink($conn, $id){
    $sql = "SELECT linkDownload FROM pedidos WHERE id = '$id'";
    $result = $conn->query($sql)->fetch_assoc();
    $a = $result['linkDownload'];
    return $a;
}

function inicioPedido($conn, $fabrica, $referencia, $marca, $linkDownload, $dataEnvio, $dataDownload, $deadlineAmostra){
    $sql = "INSERT INTO pedidos (id_fabrica, referencia, marca, linkDownload, dataEnvio, dataDownload, deadlineAmostra, revisao) VALUES ('$fabrica', '$referencia', '$marca', '$linkDownload', '$dataEnvio', '$dataDownload', '$deadlineAmostra' , 'rev0')";
    $resultado = $conn -> query($sql);
}

function buscaTodosPedidos($conn){
    $sql = "SELECT *,pedidos.id FROM pedidos INNER JOIN fabricas ON pedidos.id_fabrica = fabricas.id WHERE pedidos.finalizado = 0";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado;
}

function buscaTodosPedidosFinalizados($conn){
    $sql = "SELECT *,pedidos.id FROM pedidos INNER JOIN fabricas ON pedidos.id_fabrica = fabricas.id WHERE pedidos.finalizado = 1";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado;
}

function buscaTodosPorFabrica($conn, $id_fabrica){
    $sql = "SELECT *,pedidos.id FROM pedidos INNER JOIN fabricas ON pedidos.id_fabrica = fabricas.id WHERE pedidos.id_fabrica = '$id_fabrica' AND pedidos.finalizado = 0";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado;
}

function buscaTodosPorFabricaFinalizados($conn, $id_fabrica){
    $sql = "SELECT *,pedidos.id FROM pedidos INNER JOIN fabricas ON pedidos.id_fabrica = fabricas.id WHERE pedidos.id_fabrica = '$id_fabrica' AND pedidos.finalizado = 1";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado;
}

function confirmaDownload($conn, $id){
    $sql = "UPDATE pedidos SET downloadEfetuado = 1 WHERE id = '$id' ";
    $resultado = $conn -> query($sql);
}

function iniciaProducao($conn, $id){
    $sql = "UPDATE pedidos SET statusAmostra = 1 WHERE id = '$id' ";
    $resultado = $conn -> query($sql);
}

function inserirMedidas($conn, $weight, $w, $l, $d, $id){
    $sql = "UPDATE pedidos SET weight = '$weight', length = '$l', depth = '$d', width = '$w' WHERE id = '$id' ";
    $resultado = $conn -> query($sql);
}

function HouveMudanca($conn, $id){
    $sql = "UPDATE pedidos SET mudanca = 1 WHERE id = '$id'";
    $resultado = $conn -> query($sql);
}

function FoiVisto($conn, $id){
    $sql = "UPDATE pedidos SET mudanca = 0 WHERE id = '$id'";
    $resultado = $conn -> query($sql);
}

function buscaRevisao($conn, $id){
    $sql = "SELECT revisao FROM pedidos WHERE id = '$id' ";
    $resultado = $conn -> query($sql) -> fetch_assoc();
    return $resultado;
}

function alteraRevisao($conn, $id, $rev){
    $sql = "UPDATE pedidos SET revisao = '$rev' WHERE id = '$id' ";
    $resultado = $conn -> query($sql);
    return $resultado;
}

?>