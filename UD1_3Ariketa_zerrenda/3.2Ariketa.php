<?php
$lehenZenb = isset($_GET['lehenZenb']) ? (int)$_GET['lehenZenb'] : null;
$azkenZenb = isset($_GET['azkenZenb']) ? (int)$_GET['azkenZenb'] : null;

if ($lehenZenb !== null && $azkenZenb !== null) {
    
    $hasiera = min($lehenZenb, $azkenZenb);
    $bukaera = max($lehenZenb, $azkenZenb);
    
    $batuketa = 0;
    
    // Tarteko zenbaki guztiak banan-banan gehitu
    for ($i = $hasiera; $i <= $bukaera; $i++) {
        $batuketa += $i;
    }
    
    echo "Emaitza:<br>";
    echo "$hasiera eta $bukaera arteko zenbakien batuketa (biak barne) honako hau da: $batuketa";

} else {
    echo "Mesedez, sartu parametroak URLan. Adibidez: ?lehenZenb=1&azkenZenb=10";
}
?>