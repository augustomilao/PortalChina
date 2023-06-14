<?php

include '../models/fabrica.php';

var_dump($_POST);

novaFabrica($conn,$_POST['fabrica'],$_POST['empresa']);

header('Location: ../views/novaFabrica.php');

?>