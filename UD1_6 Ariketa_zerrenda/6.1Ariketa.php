<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Datuak Bistaratu</title>
</head>
<body>
    <h2>Jasotako Datuak</h2>
    
    <?php
    // POST bidez jasotako datuak egiaztatu
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $erabiltzailea = isset($_POST['erabiltzailea']) ? htmlspecialchars($_POST['erabiltzailea']) : '';
        $pasahitza = isset($_POST['pasahitza']) ? htmlspecialchars($_POST['pasahitza']) : '';

        echo "<p><strong>Erabiltzailea:</strong> " . $erabiltzailea . "</p>";
        echo "<p><strong>Pasahitza:</strong> " . $pasahitza . "</p>";
        echo "<p><em>(Informazioa POST bidez jaso da)</em></p>";
    } 
    // GET bidez jasotako datuak egiaztatu (hasierako probetarako)
    elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        $erabiltzailea = isset($_GET['erabiltzailea']) ? htmlspecialchars($_GET['erabiltzailea']) : '';
        $pasahitza = isset($_GET['pasahitza']) ? htmlspecialchars($_GET['pasahitza']) : '';

        if ($erabiltzailea != '' || $pasahitza != '') {
            echo "<p><strong>Erabiltzailea:</strong> " . $erabiltzailea . "</p>";
            echo "<p><strong>Pasahitza:</strong> " . $pasahitza . "</p>";
            echo "<p><em>(Informazioa GET bidez jaso da - Begiratu URLa!)</em></p>";
        } else {
            echo "<p>Ez da daturik jaso.</p>";
        }
    }
    ?>
</body>
</html>