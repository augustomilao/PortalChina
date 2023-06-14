<?php
include '../controllers/sessaoController.php';
include_once '../models/marca.php';

apagaMarca($conn, $_GET['id']);

header('Location: ../views/novaMarca.php');


?>