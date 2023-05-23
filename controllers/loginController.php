<?php
include 'sessaoController.php';
include '../models/usuario.php';


$usuario = $_POST['usuario'];
$senha = sha1($_POST['senha']);


$a = Login($conn, $usuario, $senha);

if($a != "erro"){
    CriaSessao($a['usuario']);
}else{

}

var_dump($_SESSION);

?>