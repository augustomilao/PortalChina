<?php

session_start();
include '../models/pedidos.php';
include '../models/comentarios.php';
$hoje = date('Y-m-d');


alteraDeadline($conn,$_POST['pedido'],$_POST['nova_deadline']);

$coment = "New deadline";
novoComentario($conn, $_POST['pedido'], $coment, $hoje, $_SESSION['id']);



?>

<form action="../views/pedido.php" method="post">
    <h3>Return to Submission</h3>
    <input type="hidden" name="id" value="<?= $_POST['pedido'] ?>">
    <button>Go back</button>
</form>