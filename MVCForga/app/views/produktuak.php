<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Produktuak zerrenda</title>
</head>
<body>
    <h1>Produktuak</h1>
    <ul>
        <?php foreach ($produktuak as $izena): ?>
            <li><?= htmlspecialchars($izena) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

