<?php
$i = 0;
var_dump($_POST);

echo '<br><br><br>';

var_dump($_FILES);

echo "<br><br>";

$nomes = ($_FILES["imagem"]["tmp_name"]);

$fotos = glob("../imagens/200/".$_POST['referencia']."*.png");

$contadorExistente = count($fotos);
$contadorNovo = count($nomes);

// var_dump($nomes);
echo $contadorExistente;

echo "<br><br>";


$diretorio_upload = '../imagens/200/';


while($i < $contadorNovo){
    $contadorExistente = $contadorExistente + 1;
    echo $imagem_alvo = $diretorio_upload . $_POST['referencia'] ."-".$contadorExistente.".png";
    
    echo $nomes[$i];

    move_uploaded_file($nomes[$i], $imagem_alvo);


    $i = $i + 1;
}

// TODO: MUDAR AQUI A HEADER LOCATION


?>