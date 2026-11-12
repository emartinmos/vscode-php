<?php
/**
 * ==============================================================================
 * ARCHIVO: config/database.php
 * CAPA MVC: CONFIGURACIÓN / INFRAESTRUCTURA DE DATOS
 * ==============================================================================
 * RESPONSABILIDAD:
 * Proporcionar una abstracción para la conexión a la Base de Datos usando PDO
 * (PHP Data Objects).
 *
 * CONCEPTOS CLAVE PARA EXAMEN:
 * - PDO: Extensión de PHP para acceder de forma homogénea y segura a bases de datos.
 * - Encapsulamiento: Mantiene las credenciales privadas y reutiliza la conexión.
 * - Manejo de Excepciones: Uso de try-catch con PDOException para controlar fallos de red/autenticación.
 * ==============================================================================
 */

class Database {
    /**
     * @var string Servidor donde se aloja la base de datos MySQL (habitualmente localhost)
     */
    private $host = "localhost";

    /**
     * @var string Nombre de la base de datos a la que conectaremos
     */
    private $db_name = "eskola";

    /**
     * @var string Nombre de usuario para acceder a MySQL
     */
    private $username = "root";

    /**
     * @var string Contraseña de acceso a MySQL
     */
    private $password = "";

    /**
     * @var PDO|null Instancia reutilizable de la conexión PDO
     */
    public $conn;

    /**
     * Establece y devuelve una conexión activa a la base de datos MySQL.
     *
     * @return PDO|null Retorna el objeto de conexión PDO activo o null si ocurre un error.
     */
    public function getConnection() {
        // Inicializamos la variable de conexión a null
        $this->conn = null;

        try {
            // DSN (Data Source Name): Cadena de conexión que especifica el driver, host y nombre de la BD
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

            // Instanciamos el objeto PDO pasando el DSN, usuario y contraseña
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Aseguramos que la comunicación entre PHP y MySQL use UTF-8
            // Esto evita problemas de codificación con caracteres como 'ñ', acentos o euskera (ñ, ç, etc.)
            $this->conn->exec("set names utf8");

        } catch(PDOException $exception) {
            // Si la conexión falla, se captura la excepción PDOException para evitar mostrar
            // contraseñas o datos sensibles en pantalla de forma descontrolada.
            echo "Error de conexión: " . $exception->getMessage();
        }

        // Retornamos el objeto de conexión (o null si falló)
        return $this->conn;
    }
}
?>