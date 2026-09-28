<?php
// Hilabeteen array asoziatiboa
$hilabeteak = array(
    "Urtarrila" => 31,
    "Oharaila" => 28, // Bisurtez 29
    "Martxoa" => 31,
    "Apirila" => 30,
    "Maiatza" => 31,
    "Ekaina" => 30,
    "Uztaila" => 31,
    "Abuztua" => 31,
    "Iraila" => 30,
    "Urria" => 31,
    "Azaroa" => 30,
    "Abendua" => 31
);

// Datuak pantailatik erakutsi
foreach ($hilabeteak as $hilabetea => $egunak) {
    echo $hilabetea . " hilabeteak " . $egunak . " egun ditu.<br>";
}
?>
