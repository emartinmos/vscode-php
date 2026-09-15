<?php
$lehenZenb = 5;
$azkenZenb = 12;

$batu = $lehenZenb;

echo "Hasierako balioa: " . $lehenZenb . "\n\n";

for ($i = $lehenZenb + 1; $i <= $azkenZenb; $i++) {
    $lehengoBalioa = $batu;
    $batu += $i;
    
    echo $lehengoBalioa . " + " . $i . " = " . $batu . "\n";
}

echo "\nAzken emaitza: " . $batu . "\n";
?>
