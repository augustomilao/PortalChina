<?php


$nome = ($_FILES["imagem"]["tmp_name"]);

$diretorio_upload = '../imagens/400/';

echo $imagem_alvo = $diretorio_upload . $_POST['referencia'] .".png";
    


move_uploaded_file($nome, $imagem_alvo);

?>