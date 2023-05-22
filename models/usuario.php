<?php
include 'conexao.php';

function Login($conn, $usuario, $senha){
    $query = "SELECT usuario,id FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";
    $resultado = $conn->query($query)->fetch_assoc();
    return $resultado;
}



?>