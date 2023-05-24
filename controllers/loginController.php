<?php
include 'sessaoController.php';
include '../models/usuario.php';


$usuario = $_POST['usuario'];
$senha = sha1($_POST['senha']);


$a = Login($conn, $usuario, $senha);

if($a != "erro"){
    CriaSessao($a['usuario']);
    header('Location: ../views/dashboard.php');
}else{

}



?>