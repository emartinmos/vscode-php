<?php
$bikoitiakParam = isset($_GET['bikoitiak']) ? strtolower($_GET['bikoitiak']) : null;

if ($bikoitiakParam === 'true' || $bikoitiakParam === 'false') {
    
    $mugaAleatorioa = rand(2, 98);
    
    $bikoitiakDira = ($bikoitiakParam === 'true');
    
    echo "Muga aleatorioa: $mugaAleatorioa <br>";
    echo "<p>1etik $mugaAleatorioa arteko zenbaki " . ($bikoitiakDira ? "bikoitiak>:" : "bakoitiak:") . "</p>";
    
    for ($i = 1; $i <= $mugaAleatorioa; $i++) {
        if ($bikoitiakDira && $i % 2 === 0) {
            echo "$i ";
        } elseif (!$bikoitiakDira && $i % 2 !== 0) {
            echo "$i ";
        }
    }

} else {
    echo "Mesedez, zehaztu URLan bikoitiak parametroa 'true' edo 'false' balioarekin. <br>";
    echo "Adibidez: ?bikoitiak=true edo ?bikoitiak=false";
}
?>
