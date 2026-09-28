<?php
// Jatorrizko array asoziatiboa (desordenatuta)
$produktuak = array(
    "Produktua 10" => "Katilua",
    "Produktua 2"  => "Platera",
    "Produktua 1"  => "Phikotxa",
    "Produktua 5"  => "Gozaria"
);

echo "<h3>1. Ordenazioa GAKOAREN arabera (ksort):</h3>";
$array_ksort = $produktuak; // Kopia bat egin jatorrizkoa ez galtzeko
ksort($array_ksort);

foreach ($array_ksort as $gakoa => $balioa) {
    echo $gakoa . " => " . $balioa . "<br>";
}

echo "<h3>2. Ordenazioa BALIOAREN arabera modu naturalean (asort + natsort):</h3>";

$array_natsort = $produktuak;
natsort($array_natsort); // Balioak ordena naturalaz jartzen ditu

foreach ($array_natsort as $gakoa => $balioa) {
    echo $gakoa . " => " . $balioa . "<br>";
}
?>
