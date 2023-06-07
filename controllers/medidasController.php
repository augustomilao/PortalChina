<?php
include '../models/pedidos.php';

var_dump($_POST);
// weight lenght depth width

inserirMedidas($conn, $_POST['weight'], $_POST['lenght'], $_POST['depth'], $_POST['width'], $_POST['id']);

HouveMudanca($conn, $_POST['id']);


?>