<?php
class Admin
{
    private $conn;
    private $table = "admin";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAdminById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_admin = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAdmin($username, $password, $email)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (username, password, email, created_at) VALUES (:username, :password, :email, NOW())");
        $stmt->bindParam(":username", $username);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }
    public function updateAdmin($id, $username, $password, $email)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET username = :username, password = :password, email = :email WHERE id_admin = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":username", $username);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }
    public function deleteAdmin($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_admin = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function getAllAdmins()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
