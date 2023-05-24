<?php
include '../models/comentarios.php';
var_dump($_POST);

novoComentario($conn, $_POST['id_pedidos'], $_POST['comentario'], $_POST['dataEnviado'], $_POST['usuario'])


?>