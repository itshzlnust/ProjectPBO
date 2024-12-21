<?php
class User
{
    private $conn;
    private $table = "users";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }


    public function login($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // // Debugging: Tampilkan informasi tentang user yang ditemukan
        // echo "User found: ";
        // print_r($user);

        if ($user) {
            // Debugging: Tampilkan informasi tentang password yang di-hash
            // echo "Password hash: " . $user['password'] . "<br>";
            // echo "Input password: " . $password . "<br>";

            if (password_verify($password, $user['password'])) {
                echo "Password is valid.<br>";
                return $user;
            } else {
                echo "Password is invalid.<br>";
                return $user;
            }
        } else {
            return null;
        }
    }



    public function createUser($username, $password, $email)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO $this->table (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
