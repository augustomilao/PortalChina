<?php
session_start();


function verificaSessao(){
    if(empty($_SESSION['id']) || $_SESSION['id'] == NULL){
        header('Location: login.php');
    }
}

function CriaSessao($id){
    $_SESSION['id'] = $id;
}

function ApagaSessao(){
    session_destroy();
}


?>