<?php
class Ikaslea {
    private $conn;
    private $table_name = "ikasleak";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function irakurriDena() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function irakurriBat($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function sortu($izena, $email) {
        $query = "INSERT INTO " . $this->table_name . " (izena, email) VALUES (:izena, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":izena", $izena);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }

    public function aldatu($id, $izena, $email) {
        $query = "UPDATE " . $this->table_name . " SET izena = :izena, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":izena", $izena);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function ezabatu($id) {
        // Al borrar un estudiante, se eliminan primero sus asignaturas vinculadas
        $queryIrakasgaiak = "DELETE FROM irakasgaiak WHERE ikasle_id = ?";
        $stmtIrakasgaiak = $this->conn->prepare($queryIrakasgaiak);
        $stmtIrakasgaiak->bindParam(1, $id);
        $stmtIrakasgaiak->execute();

        // Borrar el estudiante
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>