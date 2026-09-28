<?php
$user_zuzena = "admin";
$password_hash = password_hash("12345", PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $erabiltzailea = isset($_POST['erabiltzailea']) ? htmlspecialchars($_POST['erabiltzailea']) : '';
    $pasahitza = isset($_POST['pasahitza']) ? htmlspecialchars($_POST['pasahitza']) : '';

    if ($erabiltzailea === $user_zuzena && password_verify($pasahitza, $password_hash)) {
        echo "<!DOCTYPE html><html lang='eu'><head><meta charset='UTF-8'><title>Login Zuzena</title></head><body>";
        echo "<h2>Login-a zuzena izan da.</h2>";
        echo "</body></html>";
    } else {
        header("Location: 6.4Ariketa_login.php?errorea=bai");
        exit();
    }
} else {
    echo "Sarbide okerra.";
}
?>