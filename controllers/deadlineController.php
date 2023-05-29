<?php
session_start();
$hoje = date('Y-m-d');

include '../models/deadlines.php';
include '../models/comentarios.php';


novaDeadline($conn,$_POST['id_pedido'], $_POST['antiga_deadline'],$_POST['nova_deadline']);

novoComentario($conn, $_POST['id_pedido'], "<h2>Can we change the deadline?</h2>", $hoje, $_SESSION['id']);





?>