<?php
include '../models/comentarios.php';
// var_dump($_POST);
// echo '<br><br>';
session_start();
// var_dump($_SESSION);
$hoje = date('Y-m-d');

$comentario = "Can we delay the deadline? <b>" . $_POST['new_date'] . "</b> will be great.";
// echo '<br><br>';
// echo $comentario;

novoComentario($conn, $_POST['id'], $comentario, $hoje, $_SESSION['id']);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delay Deadline</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
    <h6>Delay sended</h6>
    <form action="../views/pedido.php" method="POST">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <button class="btn btn-danger">Go back</button>
    </form>
</div>

</body>

</html>