<?php

include 'conexao.php';

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




?>