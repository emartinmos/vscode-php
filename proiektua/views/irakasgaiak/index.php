<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Irakasgaiak - <?= htmlspecialchars($ikaslea['izena'] ?? '') ?></title>
</head>
<body>
    <h1>Ikaslea: <?= htmlspecialchars($ikaslea['izena'] ?? '') ?> (<?= htmlspecialchars($ikaslea['email'] ?? '') ?>)</h1>
    <h2>Irakasguien Zerrenda</h2>

    <p>
        <a href="index.php?action=sortu_irakasgaia&ikasle_id=<?= $ikaslea['id'] ?>">Irakasgai berria gehitu</a> |
        <a href="index.php">Atzera ikasleen zerrendara</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Irakasgaia</th>
                <th>Aldatu</th>
                <th>Ezabatu</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($irakasgaiak)): ?>
                <?php foreach ($irakasgaiak as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['irakasgaia']) ?></td>
                        <td>
                            <a href="index.php?action=aldatu_irakasgaia&id=<?= $item['id'] ?>&ikasle_id=<?= $ikaslea['id'] ?>">Aldatu</a>
                        </td>
                        <td>
                            <a href="index.php?action=ezabatu_irakasgaia&id=<?= $item['id'] ?>&ikasle_id=<?= $ikaslea['id'] ?>" onclick="return confirm('Ziur zaude irakasgai hau ezabatu nahi duzula?');">Ezabatu</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Ikasle honek ez dauka irakasgairik momentuz.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>