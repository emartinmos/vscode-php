<?php
/**
 * ==============================================================================
 * ARCHIVO: views/irakasgaiak/index.php
 * CAPA MVC: VISTA (View) - Listado de Asignaturas de un Alumno
 * ==============================================================================
 * RESPONSABILIDAD:
 * Renderizar la tabla con las asignaturas asociadas a un estudiante en particular.
 * Muestra el contexto del alumno seleccionado y permite gestionar sus materias.
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - Parámetros de Ruta Compuestos: Pasa tanto el ID de la asignatura (&id=) como el
 *   ID del alumno (&ikasle_id=) para no perder el contexto de navegación.
 * - Seguridad XSS: Todo dato dinámico se imprime mediante htmlspecialchars().
 * ==============================================================================
 */
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Irakasgaiak - <?= htmlspecialchars($ikaslea['izena'] ?? '') ?></title>
</head>
<body>
    <!-- Información de contexto del alumno seleccionado -->
    <h1>Ikaslea: <?= htmlspecialchars($ikaslea['izena'] ?? '') ?> (<?= htmlspecialchars($ikaslea['email'] ?? '') ?>)</h1>
    <h2>Irakasguien Zerrenda</h2>

    <!-- Enlaces de navegación: añadir nueva asignatura al alumno o volver al listado general -->
    <p>
        <a href="index.php?action=sortu_irakasgaia&ikasle_id=<?= $ikaslea['id'] ?>">Irakasgai berria gehitu</a> |
        <a href="index.php">Atzera ikasleen zerrendara</a>
    </p>

    <!-- Tabla con las asignaturas del estudiante -->
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Irakasgaia</th>
                <th>Aldatu</th>
                <th>Ezabatu</th>
            </tr>
        </thead>
        <tbody>
            <!-- Verificamos si el alumno tiene alguna asignatura matriculada -->
            <?php if (!empty($irakasgaiak)): ?>

                <!-- Iteramos sobre las asignaturas del estudiante -->
                <?php foreach ($irakasgaiak as $item): ?>
                    <tr>
                        <!-- Nombre de la asignatura escapado para evitar XSS -->
                        <td><?= htmlspecialchars($item['irakasgaia']) ?></td>

                        <!-- Enlace para modificar la asignatura manteniendo el contexto del ikasle_id -->
                        <td>
                            <a href="index.php?action=aldatu_irakasgaia&id=<?= $item['id'] ?>&ikasle_id=<?= $ikaslea['id'] ?>">
                                Aldatu
                            </a>
                        </td>

                        <!-- Enlace para eliminar la asignatura con diálogo de confirmación -->
                        <td>
                            <a href="index.php?action=ezabatu_irakasgaia&id=<?= $item['id'] ?>&ikasle_id=<?= $ikaslea['id'] ?>"
                               onclick="return confirm('Ziur zaude irakasgai hau ezabatu nahi duzula?');">
                               Ezabatu
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>

                <!-- Mensaje para cuando el alumno no tenga asignaturas registradas -->
                <tr>
                    <td colspan="3">Ikasle honek ez dauka irakasgairik momentuz.</td>
                </tr>

            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>