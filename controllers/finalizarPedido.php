<?php
session_start();
include '../models/pedidos.php';
include '../models/comentarios.php';
$hoje = date('Y-m-d');


if($_POST['status'] == 1){
    $coment = "Will be a product";
}else{
    $coment = "Canceled request";
}

finalizaPedido($conn, $_POST['pedido'], $_POST['status']);
novoComentario($conn, $_POST['pedido'], $coment, $hoje, $_SESSION['id']);


?>
<form action="../views/pedido.php" method="post">
    <h3>Return to Submission</h3>
    <input type="hidden" name="id" value="<?= $_POST['pedido'] ?>">
    <button>Go back</button>
</form>