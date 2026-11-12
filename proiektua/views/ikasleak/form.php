<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title><?= isset($ikaslea) && $ikaslea ? 'Ikaslea Aldatu' : 'Ikasle Berria' ?></title>
</head>
<body>
    <h1><?= isset($ikaslea) && $ikaslea ? 'Ikaslearen Datuak Aldatu' : 'Ikasle Berria Gehitu' ?></h1>

    <form action="" method="POST">
        <label for="izena">Izena:</label><br>
        <input type="text" id="izena" name="izena" value="<?= isset($ikaslea['izena']) ? htmlspecialchars($ikaslea['izena']) : '' ?>" required><br><br>

        <label for="email">Emaila:</label><br>
        <input type="email" id="email" name="email" value="<?= isset($ikaslea['email']) ? htmlspecialchars($ikaslea['email']) : '' ?>" required><br><br>

        <button type="submit"><?= isset($ikaslea) && $ikaslea ? 'Gorde Aldaketak' : 'Sortu Ikaslea' ?></button>
        <a href="index.php">Atzera</a>
    </form>
</body>
</html>