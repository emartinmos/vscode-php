<?php
/**
 * ==============================================================================
 * ARCHIVO: views/ikasleak/index.php
 * CAPA MVC: VISTA (View) - Listado de Alumnos
 * ==============================================================================
 * RESPONSABILIDAD:
 * Renderizar la tabla HTML con la lista completa de alumnos en el sistema.
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - htmlspecialchars(): Previene ataques XSS (Cross-Site Scripting) al escapar
 *   caracteres HTML especiales (ej. '<', '>', '&') procedentes de entradas del usuario.
 * - Sintaxis Alternativa de PHP: Uso de 'foreach (...):' y 'endforeach;' para
 *   integrar PHP de manera más legible y limpia dentro del HTML.
 * ==============================================================================
 */
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Ikasleen Zerrenda</title>
</head>
<body>
    <h1>Ikasleen Zerrenda</h1>

    <!-- Botón / Enlace para navegar al formulario de creación de un nuevo estudiante -->
    <p>
        <a href="index.php?action=sortu_ikaslea">Ikasle berria gehitu</a>
    </p>

    <!-- Tabla de presentación de estudiantes -->
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
            <!-- Comprobamos si la variable $ikasleak pasada desde el controlador contiene registros -->
            <?php if (!empty($ikasleak)): ?>

                <!-- Iteramos sobre el array de alumnos devuelto por el modelo -->
                <?php foreach ($ikasleak as $ikasle): ?>
                    <tr>
                        <!-- Escapamos con htmlspecialchars() cualquier entrada del usuario para evitar vulnerabilidades XSS -->
                        <td><?= htmlspecialchars($ikasle['izena']) ?></td>
                        <td><?= htmlspecialchars($ikasle['email']) ?></td>

                        <!-- Enlace para consultar las asignaturas asociadas a este alumno concreto -->
                        <td>
                            <a href="index.php?action=irakasgaiak&ikasle_id=<?= $ikasle['id'] ?>">Irakasgaiak</a>
                        </td>

                        <!-- Enlace para ir al formulario de edición pasando el ID por GET -->
                        <td>
                            <a href="index.php?action=aldatu_ikaslea&id=<?= $ikasle['id'] ?>">Aldatu</a>
                        </td>

                        <!-- Enlace de eliminación con confirmación interactiva en el navegador (JavaScript) -->
                        <td>
                            <a href="index.php?action=ezabatu_ikaslea&id=<?= $ikasle['id'] ?>"
                               onclick="return confirm('Ziur zaude ikasle hau eta bere irakasgai guztiak ezabatu nahi dituzula?');">
                               Ezabatu
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>

                <!-- Bloque a mostrar en caso de que la tabla de la BD esté vacía -->
                <tr>
                    <td colspan="5">Ez dago ikaslerik erregistratuta.</td>
                </tr>

            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>