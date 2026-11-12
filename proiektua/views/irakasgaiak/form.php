<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title><?= isset($irakasgaia) && $irakasgaia ? 'Irakasgaia Aldatu' : 'Irakasgai Berria' ?></title>
</head>
<body>
    <h1><?= isset($irakasgaia) && $irakasgaia ? 'Irakasgaia Aldatu' : 'Irakasgai Berria Gehitu' ?></h1>
    <p>Ikaslea: <strong><?= htmlspecialchars($ikaslea['izena'] ?? '') ?></strong></p>

    <form action="" method="POST">
        <label for="irakasgaia">Irakasgaiaren Izena:</label><br>
        <input type="text" id="irakasgaia" name="irakasgaia" value="<?= isset($irakasgaia['irakasgaia']) ? htmlspecialchars($irakasgaia['irakasgaia']) : '' ?>" required><br><br>

        <button type="submit"><?= isset($irakasgaia) && $irakasgaia ? 'Gorde Aldaketak' : 'Sortu Irakasgaia' ?></button>
        <a href="index.php?action=irakasgaiak&ikasle_id=<?= $ikaslea['id'] ?>">Atzera</a>
    </form>
</body>
</html>