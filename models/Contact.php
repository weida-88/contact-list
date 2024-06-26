<?php
class Contact {
    private $conn;
    private $table_name = "contacts";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllContacts() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createContact($name, $phone, $address) {
        if(empty($name) || empty($phone) || empty($address)) {
            return false;
        }
        $query = "INSERT INTO " . $this->table_name . " (name, phone, address) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $phone);
        $stmt->bindParam(3, $address);
        return $stmt->execute();
    }

    public function updateContact($id, $name, $phone, $address) {
        if(empty($name) || empty($phone) || empty($address)) {
            return false;
        }
        $query = "UPDATE " . $this->table_name . " SET name = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $phone);
        $stmt->bindParam(3, $address);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function deleteContact($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>
