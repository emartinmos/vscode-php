<?php
/**
 * ==============================================================================
 * ARCHIVO: models/Ikaslea.php
 * CAPA MVC: MODELO (Model) - Entidad Ikaslea (Alumno / Estudiante)
 * ==============================================================================
 * RESPONSABILIDAD:
 * Contiene la lógica de datos y acceso a la tabla 'ikasleak'.
 * Encapsula todas las operaciones CRUD (Create, Read, Update, Delete) de los alumnos.
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - Consultas Preparadas (Prepared Statements): Previenen ataques de Inyección SQL (SQLi).
 * - Modos de Fetch: PDO::FETCH_ASSOC convierte los registros devueltos en arrays asociativos.
 * - Integridad Referencial Manual: Al eliminar un alumno, borramos primero sus asignaturas vinculadas.
 * ==============================================================================
 */

class Ikaslea {
    /**
     * @var PDO Conexión a la base de datos inyectada desde el controlador
     */
    private $conn;

    /**
     * @var string Nombre de la tabla correspondiente en MySQL
     */
    private $table_name = "ikasleak";

    /**
     * Constructor del modelo Ikaslea.
     * Recibe la conexión a la base de datos por inyección de dependencias.
     *
     * @param PDO $db Objeto de conexión a la base de datos
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Obtiene todos los alumnos registrados en la base de datos.
     *
     * @return array Array asociativo con todos los registros de alumnos ordenados por ID descendente
     */
    public function irakurriDena() {
        // Consulta SQL para seleccionar todos los registros ordenados por el más reciente
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

        // Preparamos la consulta SQL para asegurar una ejecución limpia
        $stmt = $this->conn->prepare($query);

        // Ejecutamos la consulta preparada
        $stmt->execute();

        // fetchAll(PDO::FETCH_ASSOC) devuelve un array multidimensional con todas las filas devueltas
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene los datos de un único alumno especificando su ID.
     *
     * @param int|string $id Identificador único del alumno
     * @return array|false Array asociativo con los datos del alumno o false si no existe
     */
    public function irakurriBat($id) {
        // Consulta con marcador posicional '?' para limitar el resultado a un único registro
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);

        // Vinculamos el parámetro id a la primera columna interrogante (1)
        $stmt->bindParam(1, $id);

        $stmt->execute();

        // fetch(PDO::FETCH_ASSOC) extrae únicamente la primera fila devuelta como array asociativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta un nuevo alumno en la base de datos.
     *
     * @param string $izena Nombre del alumno
     * @param string $email Correo electrónico del alumno
     * @return bool True si la inserción fue exitosa, false en caso contrario
     */
    public function sortu($izena, $email) {
        // Consulta INSERT con marcadores nominados (:izena, :email)
        $query = "INSERT INTO " . $this->table_name . " (izena, email) VALUES (:izena, :email)";

        $stmt = $this->conn->prepare($query);

        // bindParam vincula la variable PHP con el marcador de la consulta preparada
        // Esto desinfecta el valor introducido y evita la Inyección SQL
        $stmt->bindParam(":izena", $izena);
        $stmt->bindParam(":email", $email);

        // execute() devuelve true si la inserción se completó correctamente
        return $stmt->execute();
    }

    /**
     * Actualiza la información de un alumno existente.
     *
     * @param int|string $id Identificador del alumno a modificar
     * @param string $izena Nuevo nombre del alumno
     * @param string $email Nuevo email del alumno
     * @return bool True si la actualización fue exitosa, false en caso contrario
     */
    public function aldatu($id, $izena, $email) {
        // Consulta UPDATE con cláusula WHERE para no modificar toda la tabla por error
        $query = "UPDATE " . $this->table_name . " SET izena = :izena, email = :email WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Vinculamos los parámetros con sus respectivos valores
        $stmt->bindParam(":izena", $izena);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    /**
     * Elimina un alumno y todas sus asignaturas vinculadas.
     *
     * @param int|string $id Identificador del alumno a eliminar
     * @return bool True si la eliminación completa fue exitosa, false en caso contrario
     */
    public function ezabatu($id) {
        // PASO 1: MANTENIMIENTO DE INTEGRIDAD REFERENCIAL
        // Como la tabla 'irakasgaiak' tiene una clave foránea (ikasle_id) hacia esta tabla,
        // borramos primero las asignaturas del alumno para evitar registros huérfanos o errores de FK.
        $queryIrakasgaiak = "DELETE FROM irakasgaiak WHERE ikasle_id = ?";
        $stmtIrakasgaiak = $this->conn->prepare($queryIrakasgaiak);
        $stmtIrakasgaiak->bindParam(1, $id);
        $stmtIrakasgaiak->execute();

        // PASO 2: BORRADO DEL ALUMNO
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);

        return $stmt->execute();
    }
}
?>