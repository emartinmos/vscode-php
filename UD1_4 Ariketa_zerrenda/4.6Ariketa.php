<?php
$zenbakiak = [];

for ($i = 0; $i < 10; $i++) {
    $zenbakiak[] = rand(0, 99);
}

$batura = array_sum($zenbakiak);
$kopurua = count($zenbakiak);
$batezbestekoa = $batura / $kopurua;

echo "Sortutako zenbakiak: " . implode(", ", $zenbakiak) . "<br>";
echo "<strong>Batezbestekoa hau da: $batezbestekoa</strong>";
?>
