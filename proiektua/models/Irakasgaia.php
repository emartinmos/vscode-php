<?php
/**
 * ==============================================================================
 * ARCHIVO: models/Irakasgaia.php
 * CAPA MVC: MODELO (Model) - Entidad Irakasgaia (Asignatura / Materia)
 * ==============================================================================
 * RESPONSABILIDAD:
 * Contiene la lógica de persistencia y gestión de datos de la tabla 'irakasgaiak'.
 * Maneja las asignaturas asociadas a un estudiante mediante la relación (ikasle_id).
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - Relación de Clave Foránea (Foreign Key): Cada asignatura pertenece a un ikasle (ikasle_id).
 * - Sentencias Preparadas (PDO): Evitan SQL Injection al parametrizar los valores.
 * ==============================================================================
 */

class Irakasgaia {
    /**
     * @var PDO Objeto de conexión a la base de datos
     */
    private $conn;

    /**
     * @var string Nombre de la tabla de asignaturas en MySQL
     */
    private $table_name = "irakasgaiak";

    /**
     * Constructor del modelo Irakasgaia.
     *
     * @param PDO $db Objeto de conexión inyectado desde el controlador
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Recupera todas las asignaturas pertenecientes a un alumno concreto.
     *
     * @param int|string $ikasle_id ID del alumno del cual queremos sus asignaturas
     * @return array Array asociativo con las asignaturas del alumno
     */
    public function irakurriIkaslearenak($ikasle_id) {
        // Seleccionamos las asignaturas filtradas por ikasle_id y ordenadas de la más reciente a la más antigua
        $query = "SELECT * FROM " . $this->table_name . " WHERE ikasle_id = ? ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        // Vinculamos el ID del alumno al marcador de posición 1
        $stmt->bindParam(1, $ikasle_id);

        $stmt->execute();

        // Devolvemos el conjunto completo de filas encontradas como array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene los datos de una única asignatura identificada por su ID.
     *
     * @param int|string $id ID de la asignatura
     * @return array|false Datos de la asignatura o false si no existe
     */
    public function irakurriBat($id) {
        // Consulta para obtener la asignatura específica
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        // Extrae y devuelve la única fila obtenida
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crea una nueva asignatura vinculada a un alumno específico.
     *
     * @param int|string $ikasle_id ID del alumno propietario de la asignatura
     * @param string $irakasgaia Nombre de la asignatura
     * @return bool True si se insertó con éxito, false en caso de error
     */
    public function sortu($ikasle_id, $irakasgaia) {
        // Insertamos la asignatura especificando el ID de su alumno
        $query = "INSERT INTO " . $this->table_name . " (ikasle_id, irakasgaia) VALUES (:ikasle_id, :irakasgaia)";

        $stmt = $this->conn->prepare($query);

        // Parametrización para garantizar la seguridad frente a SQL Injection
        $stmt->bindParam(":ikasle_id", $ikasle_id);
        $stmt->bindParam(":irakasgaia", $irakasgaia);

        return $stmt->execute();
    }

    /**
     * Modifica el nombre de una asignatura existente.
     *
     * @param int|string $id ID de la asignatura a modificar
     * @param string $irakasgaia Nuevo nombre de la asignatura
     * @return bool True si la actualización fue exitosa, false en caso contrario
     */
    public function aldatu($id, $irakasgaia) {
        // Actualizamos únicamente el nombre de la asignatura especificada por su ID
        $query = "UPDATE " . $this->table_name . " SET irakasgaia = :irakasgaia WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":irakasgaia", $irakasgaia);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    /**
     * Elimina una asignatura de la base de datos según su ID.
     *
     * @param int|string $id ID de la asignatura a eliminar
     * @return bool True si la eliminación fue exitosa, false en caso contrario
     */
    public function ezabatu($id) {
        // Borramos el registro por su clave primaria
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);

        return $stmt->execute();
    }
}
?>