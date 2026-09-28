<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>6.2 Ariketa - Emaitzak</title>
    <style>
        .gorria {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Jasotako Datuak:</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Eremuen zerrenda (HTMLko 'name' atributuak eta erakutsi nahi ditugun izenak)
        $eremuak = [
            "Izena" => "izena",
            "Abizena" => "abizena",
            "Posta elektronikoa" => "emaila"
        ];

        echo "<ul>";
        foreach ($eremuak as $etiketa => $aldagaia) {
            echo "<li>$etiketa: ";
            
            // Datuak bidali diren eta hutsik ez dauden egiaztatzen dugu
            if (isset($_POST[$aldagaia]) && trim($_POST[$aldagaia]) !== "") {
                // Datua badago: lodiz erakutsi (eta HTML etiketak garbitu segurtasunagatik)
                $balioa = htmlspecialchars(trim($_POST[$aldagaia]));
                echo "<strong>" . $balioa . "</strong>";
            } else {
                // Daturik ez badago: mezu gorria
                echo "<span class='gorria'>Datua ez da sartu.</span>";
            }
            
            echo "</li>";
        }
        echo "</ul>";

    } else {
        echo "<p class='gorria'>Ez da daturik bidali (sarbide okerra).</p>";
    }
    ?>
    
    <br>
    <a href="6.2Ariketa.html">Bueltatu formulariora</a>
</body>
</html>