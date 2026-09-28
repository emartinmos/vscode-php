<?php
// 1. URTSATSA: 50 ausazko zenbaki sortu eta array batean gorde (0 eta 49 artean)
$ausazko_zenbakiak = array();

for ($i = 0; $i < 50; $i++) {
    $ausazko_zenbakiak[] = rand(0, 49);
}

// (Aukerakoa) Jatorrizko zerrenda ikusi nahi baduzu, komentario hau kendu dezakezu:
// echo "Ssortutako zenbakiak: " . implode(", ", $ausazko_zenbakiak) . "<br><br>";


// 2. URRATSA: Zenbaki bakoitza zenbat aldiz agertzen den zenbatu
// array_count_values-ek array asoziatibo bat bueltatzen du:
// gakoa = zenbakia, balioa = zenbat aldiz agertzen den
$errepikapenak = array_count_values($ausazko_zenbakiak);


// 3. URRATSA: Emaitzak ordenatu gakoaren arabera (0tik 49ra ikusteko)
ksort($errepikapenak);


// 4. URRATSA: Emaitzak pantailatik erakutsi
echo "<h3>Zenbakien errepikapen kopurua:</h3>";

foreach ($errepikapenak as $zenbakia => $aldiz) {
    // Euskaraz singularra eta plurala ondo bereizteko baldintza txiki bat
    $testua = ($aldiz == 1) ? "aldiz agertzen da" : "aldiz agertzen da";
    echo "<b>" . $zenbakia . "</b> zenbakia: " . $aldiz . " " . $testua . ".<br>";
}
?>
