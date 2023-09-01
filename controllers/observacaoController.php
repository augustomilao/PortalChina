<?php

include '../models/conexao.php';
include '../models/pedidos.php';

InsereObservacao($conn, $_POST['id'], $_POST['observacao']);


?>
<form action="../views/pedido.php" method="post">
    <h3>Return to Submission</h3>
    <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
    <button>Go back</button>
</form>