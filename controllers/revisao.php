<?php
include '../models/pedidos.php';
$a = buscaRevisao($conn, $_POST['pedido']);
$a = $a['revisao'];

switch ($a){
    case 0:
        $a = 1;
        break;
    case 1:
        $a = 2;
        break;
    case 2:
        $a = 3;
        break;
    case 3:
        $a = 4;
        break;
    case 4:
        $a = 5;
        break;
    case 5:
        $a = 6;
        break;
}

alteraRevisao($conn, $_POST['pedido'], $a);

echo '<br><br>';
var_dump($_POST);
echo '<br><br>';
var_dump($_FILES);
