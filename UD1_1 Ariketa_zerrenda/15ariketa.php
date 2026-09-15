<?php
function ordezkatuBokalak($testua, $karakterea) {
    $patroia = '/[aeiouAEIOU]/u';
    
    // Bokalik aurkituz gero, karaktere berriarekin ordezkatu
    return preg_replace($patroia, $karakterea, $testua);
}

// Proba adibidea
$sarrera = "Kaixo mundua";
$karakterea = "*";
$irteera = ordezkatuBokalak($sarrera, $karakterea);

echo "Sarrera: " . $sarrera . "<br>";
echo "Karakterea: " . $karakterea . "<br>";
echo "Irteera: " . $irteera;
?>