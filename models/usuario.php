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

function novoUsuario($conn,$usuario,$senha,$privilegio,$id_fabrica){
    $sql = "INSERT INTO usuarios (usuario, senha, privilegio, id_fabrica) VALUES ('$usuario', '$senha', '$privilegio', '$id_fabrica')";
    $conn -> query($sql);
}

function todosUsuarios($conn){
    $query = "SELECT * FROM usuarios";
    $resultado = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

    return $resultado;
}

?>