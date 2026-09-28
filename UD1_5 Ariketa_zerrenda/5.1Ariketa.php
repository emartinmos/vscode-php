<?php
// 1. Bi pertsonen datuak array asoziatiboetan gorde
$pertsona1 = array(
    "izena" => "Ane",
    "abizena" => "Garmendia",
    "NANa" => "12345678A"
);

$pertsona2 = array(
    "izena" => "Jon",
    "abizena" => "Lopetegi",
    "NANa" => "87654321B"
);

// 2. Pertsona biak array nagusi baten barruan sartu
$pertsonak = array($pertsona1, $pertsona2);

// 3. Datuak pantailan bistaratu HTML taula formatuan
echo "<table border='1' style='border-collapse: collapse; cellpadding: 5px;'>";
echo "<tr>
        <th>Izena</th>
        <th>Abizena</th>
        <th>NANa</th>
      </tr>";

for ($i = 0; $i < count($pertsonak); $i++) {
    echo "<tr>";
    echo "<td>" . $pertsonak[$i]["izena"] . "</td>";
    echo "<td>" . $pertsonak[$i]["abizena"] . "</td>";
    echo "<td>" . $pertsonak[$i]["NANa"] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>