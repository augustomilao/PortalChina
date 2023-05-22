<?php
session_start();


function CriaSessao($id){
    $_SESSION['id'] = $id;
}

function ApagaSessao(){
    session_destroy();
}


?>