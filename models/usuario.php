<?php
include 'conexao.php';

function Login($conn, $usuario, $senha){
    $query = "SELECT id,usuario,privilegio,id_fabrica FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";
    $resultado = $conn->query($query)->fetch_assoc();
    if($resultado == NULL){
        $resultado = "Erro";
    }

    return $resultado;

}

?>