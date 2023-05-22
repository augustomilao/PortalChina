<?php

$servername = "portalchina.mysql.dbaas.com.br";
$database   = "portalchina";
$username   = "portalchina";
$password   = "Clio#@!123";

// conexão protegida
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $database);
$conn->set_charset('utf8mb4');

if (!$conn) {
    die("Erro na Conexão: " . mysqli_connect_error());
}

