<?php
$produktuak = ["Kirol-oinetakoak", "Oinetako klasikoak", "Botak", "Hondartzako esandaliak", "Etxeko zapatilak"];
$prezioak = [59.99, 75.00, 89.95, 19.99, 14.50];

echo "<h3>Gure oinetakoen zerrenda:</h3>";
echo "<ul>";

foreach ($produktuak as $indizea => $izena) {
    $prezioa = $prezioak[$indizea];
    
    echo "<li><strong>$izena</strong>: $prezioa €</li>";
}

echo "</ul>";
?>
