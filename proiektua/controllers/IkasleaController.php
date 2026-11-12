<?php
/**
 * ==============================================================================
 * ARCHIVO: controllers/IkasleaController.php
 * CAPA MVC: CONTROLADOR (Controller) - Gestión de Alumnos
 * ==============================================================================
 * RESPONSABILIDAD:
 * Coordina las acciones relacionadas con los alumnos (Ikasleak):
 * 1. Procesa las peticiones HTTP (GET y POST).
 * 2. Solicita/actualiza datos a través del Modelo (Ikaslea).
 * 3. Carga e incluye la Vista adecuada o realiza una Redirección HTTP.
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - Patrón Post/Redirect/Get (PRG): Tras procesar un POST, redirigimos con header("Location: ...")
 *   y llamamos a exit para evitar el reenvío duplicado del formulario al pulsar F5.
 * - Sanitización básica: Uso de trim() para limpiar espacios iniciales/finales involuntarios.
 * ==============================================================================
 */

include_once 'config/database.php';
include_once 'models/Ikaslea.php';

class IkasleaController {
    /**
     * @var PDO Conexión a la base de datos
     */
    private $db;

    /**
     * @var Ikaslea Instancia del modelo de Alumnos
     */
    private $ikaslea;

    /**
     * Constructor del controlador.
     * Inicializa la conexión a la base de datos e instancia el Modelo Ikaslea.
     */
    public function __construct() {
        // Obtenemos la conexión singleton/instanciada de Database
        $database = new Database();
        $this->db = $database->getConnection();

        // Creamos la instancia del modelo inyectándole la conexión PDO
        $this->ikaslea = new Ikaslea($this->db);
    }

    /**
     * Acción: Listar alumnos (Página principal / Index).
     * Solicita todos los alumnos al Modelo e incluye la vista del listado.
     *
     * @return void
     */
    public function index() {
        // Pedimos al modelo que traiga la lista de todos los estudiantes
        $ikasleak = $this->ikaslea->irakurriDena();

        // Cargamos la vista del listado. La variable $ikasleak estará disponible en la vista.
        include 'views/ikasleak/index.php';
    }

    /**
     * Acción: Crear nuevo alumno.
     * Si la petición es POST, valida la entrada, guarda el alumno y redirige.
     * Si la petición es GET, muestra el formulario de creación vacío.
     *
     * @return void
     */
    public function sortu() {
        // Comprobamos si el formulario se ha enviado mediante el método HTTP POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Recogemos y limpiamos espacios en blanco de los datos recibidos del formulario
            $izena = trim($_POST['izena']);
            $email = trim($_POST['email']);

            // Validación en el servidor: verificamos que ningún campo esté vacío
            if (!empty($izena) && !empty($email)) {
                // Invocamos al modelo para insertar el nuevo alumno en la BD
                $this->ikaslea->sortu($izena, $email);
            }

            // PATRÓN PRG (Post/Redirect/Get): Redirigimos a la página principal para limpiar la petición POST
            header("Location: index.php");
            // ¡MUY IMPORTANTE!: Siempre detendremos el script inmediatamente tras un header("Location")
            // para asegurar que no se siga ejecutando código innecesario.
            exit;

        } else {
            // Petición GET: preparamos variable $ikaslea a null para indicar que es modo "Creación"
            $ikaslea = null;

            // Renderizamos la vista del formulario
            include 'views/ikasleak/form.php';
        }
    }

    /**
     * Acción: Editar / Modificar alumno existente.
     * Si la petición es POST, actualiza los datos en la BD y redirige.
     * Si la petición es GET, recupera los datos actuales del alumno y muestra el formulario con sus datos.
     *
     * @return void
     */
    public function aldatu() {
        // Recuperamos el ID del alumno desde el parámetro GET de la URL
        $id = $_GET['id'] ?? null;

        // Si no se especificó un ID válido, no podemos editar; redirigimos al inicio
        if (!$id) {
            header("Location: index.php");
            exit;
        }

        // Si el usuario envió el formulario con los cambios (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $izena = trim($_POST['izena']);
            $email = trim($_POST['email']);

            if (!empty($izena) && !empty($email)) {
                // Actualizamos los datos del registro en la base de datos
                $this->ikaslea->aldatu($id, $izena, $email);
            }

            // Redirigimos al listado tras guardar la modificación
            header("Location: index.php");
            exit;

        } else {
            // Petición GET: Obtenemos los datos actuales del estudiante para rellenar el formulario
            $ikaslea = $this->ikaslea->irakurriBat($id);

            // Incluimos la vista del formulario (modo edición activado al pasar $ikaslea)
            include 'views/ikasleak/form.php';
        }
    }

    /**
     * Acción: Eliminar alumno.
     * Captura el ID por URL, ejecuta la eliminación y redirige al listado principal.
     *
     * @return void
     */
    public function ezabatu() {
        // Obtenemos el ID del estudiante a borrar desde la URL
        $id = $_GET['id'] ?? null;

        if ($id) {
            // Solicitamos al modelo la eliminación del alumno y sus asignaturas
            $this->ikaslea->ezabatu($id);
        }

        // Redirigimos de vuelta al listado actualizado
        header("Location: index.php");
        exit;
    }
}
?>