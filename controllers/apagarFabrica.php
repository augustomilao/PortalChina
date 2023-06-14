<?php
include '../controllers/sessaoController.php';
include_once '../models/fabrica.php';

apagaFabrica($conn, $_GET['id']);

header('Location: ../views/novaFabrica.php');


?>