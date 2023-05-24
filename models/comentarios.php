<?php
include 'conexao.php';


function comentariosPorPedido($conn, $id){
    $sql = "SELECT * FROM comentarios WHERE id_pedidos = '$id' ORDER BY id DESC";
    $result = $conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    return $result;
}

function novoComentario($conn, $id_pedidos, $comentario, $dataEnviado, $usuario){
    $sql = "INSERT INTO comentarios (id_pedidos, comentario, dataEnviado, usuario) VALUES ('$id_pedidos', '$comentario', '$dataEnviado', '$usuario')";
    $conn -> query($sql);
}

?>