<?php
date_default_timezone_set('Europe/Madrid'); 

$irteeraDataLagina = "2026-10-25 14:30:00"; 

$hegaldiData = new DateTime($irteeraDataLagina);
$unekoData = new DateTime(); 

if ($hegaldiData > $unekoData) {
    $aldea = $unekoData->diff($hegaldiData);

    echo "Gelditzen den denbora Denverrera joateko hegazkina hartzeko:\n";
    echo $aldea->format('%m hilabete, %d egun, %h ordu eta %i minutu.') . "\n";
    
} else {
    echo "Hegazkina dagoeneko irten da edo sartutako data ez da zuzena.\n";
}
?>