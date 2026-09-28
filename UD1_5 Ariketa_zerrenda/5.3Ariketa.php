<?php
// Asteko egunak eta balio osoak
$asteko_egunak = array(
    "Astelehena" => 12,
    "Asteartea" => 15,
    "Asteazkena" => 8,
    "Osteguna" => 20,
    "Ostirala" => 25,
    "Larunbata" => 30,
    "Igandea" => 10
);

// Egun bakoitza eta bere balioa erakutsi
echo "<h3>Eguneroko balioak:</h3>";
foreach ($asteko_egunak as $eguna => $balioa) {
    echo $eguna . ": " . $balioa . "<br>";
}

// Batura eta batezbestekoa kalkulatu
$batura = array_sum($asteko_egunak);
$elementu_kopurua = count($asteko_egunak);
$batezbestekoa = $batura / $elementu_kopurua;

// Emaitzak erakutsi
echo "<br><b>Balio guztien batura:</b> " . $batura . "<br>";
echo "<b>Balio guztien batezbestekoa:</b> " . round($batezbestekoa, 2) . "<br>";
?>
