<?php
// 1. Datuak 6 aldagaitan gorde
$izena1 = "Miren";
$abizena1 = "Agirre";
$nan1 = "12345678A";

$izena2 = "Jon";
$abizena2 = "Etxebarria";
$nan2 = "87654321B";

// 2. Datuak bi arraytan sartu (erab1 eta erab2)
$erab1 = [$izena1, $abizena1, $nan1];
$erab2 = [$izena2, $abizena2, $nan2];
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Erabiltzaileen taula</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; font-family: sans-serif; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

    <table>
        <tr>
            <th>Izena</th>
            <th>Abizena</th>
            <th>NANa</th>
        </tr>
        <tr>
            <td><?php echo $erab1[0]; ?></td>
            <td><?php echo $erab1[1]; ?></td>
            <td><?php echo $erab1[2]; ?></td>
        </tr>
        <tr>
            <td><?php echo $erab2[0]; ?></td>
            <td><?php echo $erab2[1]; ?></td>
            <td><?php echo $erab2[2]; ?></td>
        </tr>
    </table>

</body>
</html>
