<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>6.3 Ariketa - Emaitzak</title>
    <style>
        .gorria {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Kalkulagailuaren Emaitza:</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $zenbaki1 = isset($_POST['zenbaki1']) ? trim($_POST['zenbaki1']) : "";
        $zenbaki2 = isset($_POST['zenbaki2']) ? trim($_POST['zenbaki2']) : "";
        $eragiketa = isset($_POST['eragiketa']) ? $_POST['eragiketa'] : "";

        $errorea = false;
        $mezu_errorea = "";

        if ($zenbaki1 === "" || $zenbaki2 === "") {
            $errorea = true;
            $mezu_errorea = "Zenbaki biak bete behar dituzu.";
        } elseif (filter_var($zenbaki1, FILTER_VALIDATE_INT) === false || filter_var($zenbaki2, FILTER_VALIDATE_INT) === false) {
            $errorea = true;
            $mezu_errorea = "Sartutako datuek zenbaki osoak izan behar dute.";
        }

        if ($errorea) {
            echo "<p class='gorria'>Akatsa: " . $mezu_errorea . "</p>";
            ?>
            <form action="03ariketaKalkulagailua.php" method="POST">
                <label for="zenbaki1">1. Zenbakia (Osoa):</label><br>
                <input type="text" id="zenbaki1" name="zenbaki1" value="<?php echo htmlspecialchars($zenbaki1); ?>"><br><br>

                <label for="zenbaki2">2. Zenbakia (Osoa):</label><br>
                <input type="text" id="zenbaki2" name="zenbaki2" value="<?php echo htmlspecialchars($zenbaki2); ?>"><br><br>

                <input type="submit" name="eragiketa" value="Batuketa">
                <input type="submit" name="eragiketa" value="Kenketa">
                <input type="submit" name="eragiketa" value="Biderketa">
                <input type="submit" name="eragiketa" value="Zatiketa">
            </form>
            <?php
        } else {
            $z1 = intval($zenbaki1);
            $z2 = intval($zenbaki2);
            
            echo "<ul>";
            if ($eragiketa == "Batuketa") {
                echo "<li>Emaitza: <strong>" . ($z1 + $z2) . "</strong></li>";
            } elseif ($eragiketa == "Kenketa") {
                echo "<li>Emaitza: <strong>" . ($z1 - $z2) . "</strong></li>";
            } elseif ($eragiketa == "Biderketa") {
                echo "<li>Emaitza: <strong>" . ($z1 * $z2) . "</strong></li>";
            } elseif ($eragiketa == "Zatiketa") {
                if ($z2 == 0) {
                    echo "<li class='gorria'>Akatsa: Ezin da zeroz zatitu.</li>";
                } else {
                    echo "<li>Emaitza: <strong>" . ($z1 / $z2) . "</strong></li>";
                }
            }
            echo "</ul>";
        }

    } else {
        echo "<p class='gorria'>Ez da daturik bidali (sarbide okerra).</p>";
    }
    ?>
    
    <br>
    <a href="6.3Ariketa.html">Bueltatu formulariora</a>
</body>
</html>