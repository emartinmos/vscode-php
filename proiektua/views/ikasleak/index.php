<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Ikasleen Zerrenda</title>
</head>
<body>
    <h1>Ikasleen Zerrenda</h1>
    <p>
        <a href="index.php?action=sortu_ikaslea">Ikasle berria gehitu</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Izena</th>
                <th>Email</th>
                <th>Irakasgaiak</th>
                <th>Aldatu</th>
                <th>Ezabatu</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($ikasleak)): ?>
                <?php foreach ($ikasleak as $ikasle): ?>
                    <tr>
                        <td><?= htmlspecialchars($ikasle['izena']) ?></td>
                        <td><?= htmlspecialchars($ikasle['email']) ?></td>
                        <td>
                            <a href="index.php?action=irakasgaiak&ikasle_id=<?= $ikasle['id'] ?>">Irakasgaiak</a>
                        </td>
                        <td>
                            <a href="index.php?action=aldatu_ikaslea&id=<?= $ikasle['id'] ?>">Aldatu</a>
                        </td>
                        <td>
                            <a href="index.php?action=ezabatu_ikaslea&id=<?= $ikasle['id'] ?>" onclick="return confirm('Ziur zaude ikasle hau eta bere irakasgai guztiak ezabatu nahi dituzula?');">Ezabatu</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Ez dago ikaslerik erregistratuta.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>