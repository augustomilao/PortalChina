<?php
include '../models/pedidos.php';


FoiVisto($conn,$_POST['pedido']);

?>

<form action="../views/pedido.php" method="post">
    <h3>Return to Submission</h3>
    <input type="hidden" name="id" value="<?= $_POST['pedido'] ?>">
    <button>Go back</button>
</form>