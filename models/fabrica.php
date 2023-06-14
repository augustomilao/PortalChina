<?php

include 'conexao.php';

function mostraFabricas($conn){
    $sql = "SELECT id, nome FROM fabricas ORDER BY nome ASC";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado; 
}

function mostraFabricasPorEmpresa($conn, $empresa){
    $sql = "SELECT id, nome FROM fabricas WHERE empresa = '$empresa' ORDER BY nome ASC";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $resultado; 
}

function pegaFabricaPorID($conn, $id){
    $sql = "SELECT  nome FROM fabricas WHERE id = '$id'";
    $resultado = $conn -> query($sql) -> fetch_assoc();
    return $resultado; 
}

function novaFabrica($conn, $nome, $empresa){
    $sql = "INSERT INTO  fabricas (nome,empresa) VALUES ('$nome', '$empresa')";
    $resultado = $conn -> query($sql);
}

function apagaFabrica($conn, $id){
    $sql = "DELETE FROM fabricas WHERE id = '$id'";
    $resultado = $conn -> query($sql);
}



?>