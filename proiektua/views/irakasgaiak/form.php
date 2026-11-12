<?php
/**
 * ==============================================================================
 * ARCHIVO: views/irakasgaiak/form.php
 * CAPA MVC: VISTA (View) - Formulario de Asignatura (Crear / Editar)
 * ==============================================================================
 * RESPONSABILIDAD:
 * Renderizar el formulario HTML para añadir una nueva asignatura o editar
 * una ya existente asignada a un alumno concreto.
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - Conservación del Contexto: El botón 'Atzera' (Volver) incluye el ikasle_id para
 *   regresar al listado de asignaturas del estudiante correcto y no a la raíz.
 * - Validación HTML5: Uso del atributo 'required' en los campos del formulario.
 * ==============================================================================
 */
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <!-- Título de la pestaña según la operación (Editar o Crear) -->
    <title><?= isset($irakasgaia) && $irakasgaia ? 'Irakasgaia Aldatu' : 'Irakasgai Berria' ?></title>
</head>
<body>
    <!-- Encabezado de la página -->
    <h1><?= isset($irakasgaia) && $irakasgaia ? 'Irakasgaia Aldatu' : 'Irakasgai Berria Gehitu' ?></h1>

    <!-- Mostramos el nombre del alumno al que le estamos gestionando la asignatura -->
    <p>Ikaslea: <strong><?= htmlspecialchars($ikaslea['izena'] ?? '') ?></strong></p>

    <!-- Formulario POST enviado a la URL actual -->
    <form action="" method="POST">

        <!-- Campo para el nombre de la asignatura -->
        <label for="irakasgaia">Irakasgaiaren Izena:</label><br>
        <input type="text"
               id="irakasgaia"
               name="irakasgaia"
               value="<?= isset($irakasgaia['irakasgaia']) ? htmlspecialchars($irakasgaia['irakasgaia']) : '' ?>"
               required><br><br>

        <!-- Botón submit con texto contextual -->
        <button type="submit">
            <?= isset($irakasgaia) && $irakasgaia ? 'Gorde Aldaketak' : 'Sortu Irakasgaia' ?>
        </button>

        <!-- Enlace para volver a la lista de asignaturas de ESTE alumno -->
        <a href="index.php?action=irakasgaiak&ikasle_id=<?= $ikaslea['id'] ?>">Atzera</a>

    </form>
</body>
</html>