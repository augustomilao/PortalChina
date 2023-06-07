<?php
include 'conexao.php';

function PegaMarcasEmpresa($conn, $empresa){
    $sql = "SELECT * FROM marcas WHERE empresa = '$empresa'";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    
    return $resultado;
}

function inserirMarca($conn, $nome, $empresa){
    $sql = "INSERT INTO marcas (nome, empresa) VALUES ('$nome', '$empresa')";
    $conn -> query($sql);
}

function PegaMarcas($conn){
    $sql = "SELECT * FROM marcas";
    $resultado = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    
    return $resultado;
}



?>