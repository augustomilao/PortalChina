<?php
session_start();


function verificaSessao(){
    if(empty($_SESSION['id']) || $_SESSION['id'] == NULL){
        header('Location: login.php');
    }
}

function CriaSessao($id, $fabrica){
    $_SESSION['id'] = $id;
    $_SESSION['fabrica'] = $fabrica;
}

function ApagaSessao(){
    session_destroy();
}


?>