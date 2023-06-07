<?php
$i = 0;
// var_dump($_POST);
include_once '../models/pedidos.php';

// echo '<br><br><br>';

// var_dump($_FILES);

echo "<br><br>";

$nomes = ($_FILES["imagem"]["tmp_name"]);

$rev = $_POST['revisao'];

$fotos = glob("../imagens/200/".$_POST['referencia']."*.png");

$contadorExistente = count($fotos);
$contadorNovo = count($nomes);

// var_dump($nomes);
echo $contadorExistente;

echo "<br><br>";


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
    echo $imagem_alvo = $diretorio_upload . $_POST['referencia'] ."-".$contadorExistente.".png";
    
    echo $nomes[$i];

    move_uploaded_file($nomes[$i], $imagem_alvo);


    $i = $i + 1;
}

HouveMudanca($conn, $_POST['id']);
// TODO: MUDAR AQUI A HEADER LOCATION


?>