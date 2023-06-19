<?php
session_start();

include '../models/pedidos.php';
include_once '../models/comentarios.php';
$a = buscaRevisao($conn, $_POST['pedido']);
$a = $a['revisao'];
$hoje = date('Y-m-d');

switch ($a){
    case 0:
        $a = 1;
        $rev = "rev1/";
        break;
    case 1:
        $a = 2;
        $rev = "rev2/";
        break;
    case 2:
        $a = 3;
        $rev = "rev3/";
        break;
    case 3:
        $a = 4;
        $rev = "rev4/";
        break;
    case 4:
        $a = 5;
        $rev = "rev5/";
        break;
    case 5:
        $a = 6;
        $rev = "rev6/";
        break;
}



alteraRevisao($conn, $_POST['pedido'], $a);

$referencia = buscaReferencia($conn, $_POST['pedido']);
$referencia = $referencia['referencia'];

$nome = ($_FILES["revisao"]["tmp_name"]);
$diretorio_upload = '../imagens/200/' .$rev;
$imagem_alvo = $diretorio_upload . $referencia ."-aa".".png";

move_uploaded_file($nome, $imagem_alvo);

alteraDeadline($conn,$_POST['pedido'],$_POST['nova_deadline']);

HouveMudanca($conn, $_POST['pedido']);
$coment = "New revision requested : ".$rev;
novoComentario($conn, $_POST['pedido'], $coment, $hoje, $_SESSION['id']);

?>

<form action="../views/pedido.php" method="post">
    <h3>Return to Submission</h3>
    <input type="hidden" name="id" value="<?= $_POST['pedido'] ?>">
    <button>Go back</button>
</form>