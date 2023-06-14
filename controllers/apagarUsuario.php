<?php
include '../controllers/sessaoController.php';
include_once '../models/usuario.php';

apagaUsuario($conn, $_GET['id']);

header('Location: ../views/novoUsuario.php');


?>