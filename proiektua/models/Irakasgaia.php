<?php
class Irakasgaia {
    private $conn;
    private $table_name = "irakasgaiak";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function irakurriIkaslearenak($ikasle_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ikasle_id = ? ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $ikasle_id);
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

    public function sortu($ikasle_id, $irakasgaia) {
        $query = "INSERT INTO " . $this->table_name . " (ikasle_id, irakasgaia) VALUES (:ikasle_id, :irakasgaia)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":ikasle_id", $ikasle_id);
        $stmt->bindParam(":irakasgaia", $irakasgaia);
        return $stmt->execute();
    }

    public function aldatu($id, $irakasgaia) {
        $query = "UPDATE " . $this->table_name . " SET irakasgaia = :irakasgaia WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":irakasgaia", $irakasgaia);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function ezabatu($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>