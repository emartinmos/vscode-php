<?php
$muga = isset($_GET['muga']) ? (int)$_GET['muga'] : null;

if ($muga !== null && $muga >= 2) {
    echo "1etik $muga arte dauden zenbaki lehenak:<br>";
    
    for ($i = 2; $i <= $muga; $i++) {
        $lehenaDa = true;
        
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j === 0) {
                $lehenaDa = false;
                break;
            }
        }
        
        if ($lehenaDa) {
            echo "$i ";
        }
    }
} else {
    echo "Mesedez, sartu 2 edo handiagoa den muga bat URLan. Adibidez: ?muga=50";
}
?>
