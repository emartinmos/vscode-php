<?php
$sarrera = "Zerua urdina da";

$garbituta = trim($sarrera);
$hitzak = explode(" ", $garbituta);

$kopurua = count($hitzak);

echo "Sarrera: " . $sarrera . "\n";
echo "Irteera: " . $kopurua;
?>