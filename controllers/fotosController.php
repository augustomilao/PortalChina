<?php
session_start();
$i = 0;
$hoje = date('Y-m-d');
// var_dump($_POST);
include_once '../models/pedidos.php';
include_once '../models/comentarios.php';

// echo '<br><br><br>';

// var_dump($_FILES);

// echo "<br><br>";

$nomes = ($_FILES["imagem"]["tmp_name"]);

$rev = $_POST['revisao'];

$fotos = glob("../imagens/200/".$_POST['referencia']."*.png");

$contadorExistente = count($fotos);
$contadorNovo = count($nomes);

// var_dump($nomes);
// echo $contadorExistente;

// echo "<br><br>";


$diretorio_upload = '../imagens/200/';


switch ($rev){    
    case 0:
        $rev = "";
        break;
    case 1:
        $rev = "rev1/";
        break;
    case 2:
        $rev = "rev2/";
        break;
    case 3:
        $rev = "rev3/";
        break;
    case 4:
        $rev = "rev4/";
        break;
    case 5:
        $rev = "rev5/";
        break;
}

$diretorio_upload = '../imagens/200/' .$rev;
// var_dump($diretorio_upload);


while($i < $contadorNovo){
    $contadorExistente = $contadorExistente + 1;
    $imagem_alvo = $diretorio_upload . $_POST['referencia'] ."-".$contadorExistente.".png";
    
    $nomes[$i];

    move_uploaded_file($nomes[$i], $imagem_alvo);


    $i = $i + 1;
}

HouveMudanca($conn, $_POST['id']);
$coment = "New images added in revision".$rev;
novoComentario($conn, $_POST['id'], $coment, $hoje, $_SESSION['id']);

// TODO: MUDAR AQUI A HEADER LOCATION


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Changes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
    <h6>Changes Made</h6>
    <form action="../views/pedido.php" method="POST">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <button class="btn btn-danger">Go back</button>
    </form>
</div>

</body>

</html>