<?php

include '../models/pedidos.php'; 

$id = $_GET['i'];

confirmaDownload($conn, $id);

$link = buscaLink($conn, $id);

echo $link;
header('Location: '. $link);

?>
