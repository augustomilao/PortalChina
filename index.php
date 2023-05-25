<?php

$hoje = date('Y-m-d');
$timestamp = strtotime('+10 days');
$prazo = date('Y-m-d', $timestamp);

echo $hoje . " | " . $prazo;

echo "<br>";

echo  $a = (strtotime($hoje) - strtotime($prazo));

echo "<br>";
// echo date('Y-m-d', $a);

echo ($a/86400); # Dividir por isso par conseguir os dias


?>