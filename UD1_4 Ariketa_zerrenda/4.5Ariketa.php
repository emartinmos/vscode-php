<?php
$zenbakiak = [];

for ($i = 0; $i < 10; $i++) {
    $zenbakiak[] = rand(0, 99);
}

$txikiena = min($zenbakiak);

echo "Sortutako 10 ausazko zenbakiak: " . implode(", ", $zenbakiak) . "<br>";
echo "<strong>Zenbakirik txikiena hau da: $txikiena</strong>";
?>
