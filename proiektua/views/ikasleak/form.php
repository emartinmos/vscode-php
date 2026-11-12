<?php
/**
 * ==============================================================================
 * ARCHIVO: views/ikasleak/form.php
 * CAPA MVC: VISTA (View) - Formulario de Alumno (Crear / Editar)
 * ==============================================================================
 * RESPONSABILIDAD:
 * Renderiza el formulario HTML tanto para CREAR un nuevo alumno como para EDITAR
 * los datos de un alumno existente.
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - Formulario Reutilizable: Si el controlador pasa $ikaslea con datos, se rellena
 *   el valor de los campos (modo edición). Si pasa null, los campos quedan vacíos (modo creación).
 * - Operador Ternario: Permite alternar títulos y valores dinámicamente:
 *   condición ? valor_si_verdadero : valor_si_falso
 * - action="": Si el atributo action está vacío o omitido, la petición POST se envía
 *   a la misma URL exacta que renderizó el formulario.
 * ==============================================================================
 */
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <!-- Título dinámico del documento según si estamos editando o creando -->
    <title><?= isset($ikaslea) && $ikaslea ? 'Ikaslea Aldatu' : 'Ikasle Berria' ?></title>
</head>
<body>
    <!-- Encabezado principal adaptado dinámicamente -->
    <h1><?= isset($ikaslea) && $ikaslea ? 'Ikaslearen Datuak Aldatu' : 'Ikasle Berria Gehitu' ?></h1>

    <!-- Formulario enviado mediante POST a la misma URL activa -->
    <form action="" method="POST">

        <!-- Campo para el Nombre del Alumno -->
        <label for="izena">Izena:</label><br>
        <input type="text"
               id="izena"
               name="izena"
               value="<?= isset($ikaslea['izena']) ? htmlspecialchars($ikaslea['izena']) : '' ?>"
               required><br><br>

        <!-- Campo para el Email del Alumno -->
        <label for="email">Emaila:</label><br>
        <input type="email"
               id="email"
               name="email"
               value="<?= isset($ikaslea['email']) ? htmlspecialchars($ikaslea['email']) : '' ?>"
               required><br><br>

        <!-- Botón de envío con texto adaptado dinámicamente -->
        <button type="submit">
            <?= isset($ikaslea) && $ikaslea ? 'Gorde Aldaketak' : 'Sortu Ikaslea' ?>
        </button>

        <!-- Enlace para cancelar y regresar al listado principal -->
        <a href="index.php">Atzera</a>

    </form>
</body>
</html>