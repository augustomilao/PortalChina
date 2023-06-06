<?php

include '../models/usuario.php';


$usuario = $_POST['usuario'];
$senha = sha1($_POST['senha']);
$privilegio = $_POST['privilegio'];

if($privilegio == "gerente"){
    $fabrica = 80;
}else{
    $fabrica = $_POST['fabrica'];
}

novoUsuario($conn,$usuario,$senha,$privilegio,$fabrica);

header('Location: ../views/dashboard.php');

?>