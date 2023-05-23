<?php
include '../models/pedidos.php';

$pedido = $_GET['i'];

$a = buscaPedidoID($conn, $pedido);

var_dump($a);
?>