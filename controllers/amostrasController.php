<?php
session_start();
// var_dump($_SESSION);

$hoje = date('Y-m-d');

include '../models/pedidos.php';
include '../models/comentarios.php';

iniciaProducao($conn,$_POST['id']);
novoComentario($conn,$_POST['id'],"<h2>Great! We can go to production</h2>",$hoje ,$_SESSION['id']);



?>