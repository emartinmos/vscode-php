<?php
function zenbatuBokalak($testua) {
    preg_match_all('/[aeiouAEIOU]/u', $testua, $emaitza);
    
    return count($emaitza[0]);
}

$sarrera = "Kaixo mundua";
$irteera = zenbatuBokalak($sarrera);

echo "Sarrera: " . $sarrera . "<br>";
echo "Irteera: " . $irteera;
?>