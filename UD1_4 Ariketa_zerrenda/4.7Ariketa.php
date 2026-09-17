<?php
$zenbakiak = [];
for ($i = 0; $i < 10; $i++) {
    $zenbakiak[] = rand(1, 200);
}
echo "Sortutako zenbakiak: " . implode(", ", $zenbakiak) . "<br>";
print_r($zenbakiak);
$arrayInvertido = array_reverse($zenbakiak);
echo "<br>" . "Sortutako zenbakiak buelta emanda: " . implode(", ", $arrayInvertido) . "<br>";
?>
