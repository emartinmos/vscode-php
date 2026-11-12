<?php
/**
 * ==============================================================================
 * ARCHIVO: controllers/IrakasgaiaController.php
 * CAPA MVC: CONTROLADOR (Controller) - Gestión de Asignaturas
 * ==============================================================================
 * RESPONSABILIDAD:
 * Controla el flujo de trabajo de las asignaturas (Irakasgaiak) asociadas a los alumnos.
 * Interactúa con los modelos 'Irakasgaia' e 'Ikaslea' para coordinar la información.
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - Uso de Múltiples Modelos: Un controlador puede consumir varias clases modelo cuando la vista
 *   requiere información combinada (ej. datos del alumno + lista de sus asignaturas).
 * - Persistencia del Parámetro de Contexto: Mantiene el 'ikasle_id' en la URL para no perder la referencia del alumno.
 * ==============================================================================
 */

include_once 'config/database.php';
include_once 'models/Irakasgaia.php';
include_once 'models/Ikaslea.php';

class IrakasgaiaController {
    /**
     * @var PDO Conexión a la base de datos
     */
    private $db;

    /**
     * @var Irakasgaia Modelo para gestionar asignaturas
     */
    private $irakasgaia;

    /**
     * @var Ikaslea Modelo para consultar datos del alumno al que pertenecen las asignaturas
     */
    private $ikaslea;

    /**
     * Constructor del controlador IrakasgaiaController.
     * Instancia la conexión a la base de datos y los dos modelos requeridos.
     */
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();

        // Instanciación de ambos modelos
        $this->irakasgaia = new Irakasgaia($this->db);
        $this->ikaslea = new Ikaslea($this->db);
    }

    /**
     * Acción: Listar asignaturas de un alumno determinado.
     * Carga tanto la información del estudiante como el listado de sus materias.
     *
     * @return void
     */
    public function index() {
        // Obtenemos el ID del alumno recibido como parámetro GET en la URL
        $ikasle_id = $_GET['ikasle_id'] ?? null;

        // Si no se proporciona un ikasle_id, no se puede cargar la vista contextual; redirigimos al inicio
        if (!$ikasle_id) {
            header("Location: index.php");
            exit;
        }

        // Consultamos la información básica del estudiante mediante el modelo Ikaslea
        $ikaslea = $this->ikaslea->irakurriBat($ikasle_id);

        // Consultamos todas las asignaturas de este estudiante específico mediante el modelo Irakasgaia
        $irakasgaiak = $this->irakasgaia->irakurriIkaslearenak($ikasle_id);

        // Renderizamos la vista del listado de asignaturas
        include 'views/irakasgaiak/index.php';
    }

    /**
     * Acción: Crear / Añadir una asignatura a un alumno.
     * En POST: Guarda la asignatura y redirige a la lista de asignaturas del alumno.
     * En GET: Recupera los datos del alumno y muestra el formulario de asignaturas.
     *
     * @return void
     */
    public function sortu() {
        // Requerimos siempre el ikasle_id para saber a qué alumno asociar la asignatura
        $ikasle_id = $_GET['ikasle_id'] ?? null;

        if (!$ikasle_id) {
            header("Location: index.php");
            exit;
        }

        // Procesamiento del formulario enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombreIrakasgaia = trim($_POST['irakasgaia']);

            // Verificamos que se haya introducido un nombre de asignatura
            if (!empty($nombreIrakasgaia)) {
                $this->irakasgaia->sortu($ikasle_id, $nombreIrakasgaia);
            }

            // Redirigimos de vuelta a las asignaturas de ESTE alumno específico
            header("Location: index.php?action=irakasgaiak&ikasle_id=" . $ikasle_id);
            exit;

        } else {
            // Petición GET: obtenemos la información del alumno para mostrar su nombre en la vista
            $ikaslea = $this->ikaslea->irakurriBat($ikasle_id);
            $irakasgaia = null; // null indica que el formulario estará en modo "Creación"

            include 'views/irakasgaiak/form.php';
        }
    }

    /**
     * Acción: Editar / Modificar una asignatura existente.
     * En POST: Actualiza el nombre de la asignatura y redirige.
     * En GET: Carga los datos actuales del alumno y de la asignatura para el formulario.
     *
     * @return void
     */
    public function aldatu() {
        // Necesitamos tanto el ID de la asignatura ($id) como el ID del alumno ($ikasle_id)
        $id = $_GET['id'] ?? null;
        $ikasle_id = $_GET['ikasle_id'] ?? null;

        if (!$id || !$ikasle_id) {
            header("Location: index.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombreIrakasgaia = trim($_POST['irakasgaia']);

            if (!empty($nombreIrakasgaia)) {
                $this->irakasgaia->aldatu($id, $nombreIrakasgaia);
            }

            // Redirigimos al listado de asignaturas del alumno tras guardar
            header("Location: index.php?action=irakasgaiak&ikasle_id=" . $ikasle_id);
            exit;

        } else {
            // Petición GET: cargamos datos para alimentar la plantilla
            $ikaslea = $this->ikaslea->irakurriBat($ikasle_id);
            $irakasgaia = $this->irakasgaia->irakurriBat($id);

            include 'views/irakasgaiak/form.php';
        }
    }

    /**
     * Acción: Eliminar una asignatura.
     * Recibe por GET el id de la asignatura y el ikasle_id para saber a dónde volver.
     *
     * @return void
     */
    public function ezabatu() {
        $id = $_GET['id'] ?? null;
        $ikasle_id = $_GET['ikasle_id'] ?? null;

        if ($id && $ikasle_id) {
            // Eliminamos el registro de la asignatura
            $this->irakasgaia->ezabatu($id);

            // Redirigimos de vuelta a la lista de asignaturas del estudiante
            header("Location: index.php?action=irakasgaiak&ikasle_id=" . $ikasle_id);
        } else {
            // Si faltan parámetros obligatorios, volvemos al inicio general
            header("Location: index.php");
        }

        exit;
    }
}
?>