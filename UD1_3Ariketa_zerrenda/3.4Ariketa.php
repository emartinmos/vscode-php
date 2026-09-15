<?php
$zenbakia = isset($_GET['zenbakia']) ? (int)$_GET['zenbakia'] : null;

if ($zenbakia !== null) {
    $lehenaDa = true;

    if ($zenbakia <= 1) {
        $lehenaDa = false;
    } else {
        for ($i = 2; $i <= sqrt($zenbakia); $i++) {
            if ($zenbakia % $i === 0) {
                $lehenaDa = false;
                break; 
            }
        }
    }

    if ($lehenaDa) {
        echo "$zenbakia zenbakia LEHENA da.";
    } else {
        echo "$zenbakia zenbakia EZ da lehena.";
    }

} else {
    echo "Mesedez, sartu zenbaki bat URLan. Adibidez: ?zenbakia=17";
}
?>
