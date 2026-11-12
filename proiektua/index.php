<?php
/**
 * ==============================================================================
 * ARCHIVO: index.php
 * CAPA MVC: FRONT CONTROLLER (Enrutador Principal)
 * ==============================================================================
 * RESPONSABILIDAD:
 * Es el punto único de entrada (Single Entry Point) a la aplicación.
 * 1. Carga los controladores necesarios.
 * 2. Captura la acción solicitada por el usuario mediante el parámetro 'action' en la URL ($_GET).
 * 3. Delega la ejecución del flujo de trabajo al método adecuado del Controlador correspondiente.
 *
 * VENTAJAS EN MVC:
 * Centraliza la seguridad, la gestión de rutas y la inicialización de la aplicación
 * en un único lugar, evitando tener múltiples scripts accesibles directamente.
 * ==============================================================================
 */

// ------------------------------------------------------------------------------
// 1. INCLUSIÓN DE CONTROLADORES
// ------------------------------------------------------------------------------
// Usamos 'include_once' para asegurar que las definiciones de clase se carguen
// solo una vez, evitando errores de redefinición de clases.
include_once 'controllers/IkasleaController.php';
include_once 'controllers/IrakasgaiaController.php';

// ------------------------------------------------------------------------------
// 2. INSTANCIACIÓN DE CONTROLADORES
// ------------------------------------------------------------------------------
// Se crean los objetos controladores para tener disponibles sus métodos.
$ikasleaController = new IkasleaController();
$irakasgaiaController = new IrakasgaiaController();

// ------------------------------------------------------------------------------
// 3. CAPTURA DE LA ACCIÓN / RUTA
// ------------------------------------------------------------------------------
// Utilizaremos el operador de fusión de nulos (??) de PHP 7+:
// Si $_GET['action'] está definido y no es null, se usa su valor;
// de lo contrario, se asigna 'index' como acción por defecto.
$action = $_GET['action'] ?? 'index';

// ------------------------------------------------------------------------------
// 4. ENRUTAMIENTO (SWITCH DE ACCIONES)
// ------------------------------------------------------------------------------
// Evalúa la acción solicitada y llama al método del controlador encargado.
switch ($action) {

    // --------------------------------------------------------------------------
    // RUTAS ASOCIADAS A IKASLEAK (ALUMNOS)
    // --------------------------------------------------------------------------
    case 'index':
        // Carga el listado principal de estudiantes
        $ikasleaController->index();
        break;

    case 'sortu_ikaslea':
        // Muestra el formulario o procesa la creación de un estudiante
        $ikasleaController->sortu();
        break;

    case 'aldatu_ikaslea':
        // Muestra el formulario o procesa la edición de un estudiante existente
        $ikasleaController->aldatu();
        break;

    case 'ezabatu_ikaslea':
        // Elimina un estudiante por su ID
        $ikasleaController->ezabatu();
        break;

    // --------------------------------------------------------------------------
    // RUTAS ASOCIADAS A IRAKASGAIAK (ASIGNATURAS)
    // --------------------------------------------------------------------------
    case 'irakasgaiak':
        // Muestra las asignaturas asociadas a un alumno específico
        $irakasgaiaController->index();
        break;

    case 'sortu_irakasgaia':
        // Muestra el formulario o procesa la asignación de una nueva asignatura
        $irakasgaiaController->sortu();
        break;

    case 'aldatu_irakasgaia':
        // Muestra el formulario o procesa la modificación de una asignatura
        $irakasgaiaController->aldatu();
        break;

    case 'ezabatu_irakasgaia':
        // Elimina una asignatura específica por su ID
        $irakasgaiaController->ezabatu();
        break;

    // --------------------------------------------------------------------------
    // RUTA POR DEFECTO (FALLBACK)
    // --------------------------------------------------------------------------
    default:
        // Si la acción solicitada no existe en el switch, redirige al listado principal
        $ikasleaController->index();
        break;
}
?>