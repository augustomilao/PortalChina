<?php

include '../models/marca.php';

$marca = $_POST['marca'];
$empresa = $_POST['empresa'];

inserirMarca($conn, $marca, $empresa);

header('Location: ../views/novaMarca.php');

?>