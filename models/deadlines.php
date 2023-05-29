<?php
include 'conexao.php';

function novaDeadline($conn, $id_pedido, $antiga_deadline, $nova_deadline){
    $sql = "INSERT INTO deadlines (id_pedido, antiga_deadline, nova_deadline) VALUES ('$id_pedido', '$antiga_deadline', '$nova_deadline')";
    $conn -> query($sql);
}

function visualizaDeadline($conn){
    $sql = "SELECT * FROM deadlines WHERE vista = 0";
    $result = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);

    return $result;
}

function visualizaDeadlineFabrica($conn){
    $sql = "SELECT * FROM deadlines WHERE vista = 0";
    $result = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);

    return $result;
}


