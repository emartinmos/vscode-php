<?php
$produktuak = ["Kirol-oinetakoak", "Oinetako klasikoak", "Botak", "Hondartzako esandaliak", "Etxeko zapatilak"];
$prezioak = [59.99, 75.00, 89.95, 19.99, 14.50];

$beherapena = 20;

echo "<h3>Beherapen bereziak (%$beherapena):</h3>";
echo "<ul>";

foreach ($produktuak as $indizea => $izena) {
    $prezioZaharra = $prezioak[$indizea];
    
    $prezioBerria = $prezioZaharra - ($prezioZaharra * $beherapena / 100);
    
    $prezioBerria = round($prezioBerria, 2);
    
    $prezioak[$indizea] = $prezioBerria;
    
    echo "<li>";
    echo "<strong>$izena</strong>:<br>";
    echo "Prezio zaharra: <del>$prezioZaharra €</del> | "; // <del> testua marratzeko da
    echo "<strong>Prezio berria: $prezioBerria €</strong>";
    echo "</li><br>";
}

echo "</ul>";
?>
