<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Login Formularioa</title>
    <style>
        .errorea {
            color: red;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h2>Sartu zure datuak</h2>
    
    <form action="6.4Ariketa.php" method="POST">
        <label for="erabiltzailea">Erabiltzailea:</label>
        <input type="text" id="erabiltzailea" name="erabiltzailea" required><br><br>

        <label for="pasahitza">Pasahitza:</label>
        <input type="password" id="pasahitza" name="pasahitza" required><br><br>

        <input type="submit" value="Bidali">
    </form>

    <?php
    // Si la redirección nos envía el parámetro de error, mostramos el mensaje
    if (isset($_GET['errorea']) && $_GET['errorea'] == 'bai') {
        echo '<div class="errorea">erabiltzaile edo pasahitz okerra</div>';
    }
    ?>
</body>
</html>