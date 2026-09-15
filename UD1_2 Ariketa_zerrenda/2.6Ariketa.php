<?php
function batuketaSekuentziala($lehenZenb, $azkenZenb) {
    $kateAdierazpena = $lehenZenb . " + 1";
    $emaitza = $lehenZenb + 1;

    for ($i = $lehenZenb; $i <= $azkenZenb; $i++) {
        $kateAdierazpena .= " + " . $i;
        $emaitza += $i;
    }

    echo "lehenZenb = " . $lehenZenb . "\n";
    echo "azkenZenb = " . $azkenZenb . "\n";
    echo "Emaitza = " . $kateAdierazpena . " = " . $emaitza . "\n\n";
}

batuketaSekuentziala(2, 3);

batuketaSekuentziala(2, 5);
?>
