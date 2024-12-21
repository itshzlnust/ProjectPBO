<?php
require_once "./App/Config/Database.php";

class Watchlist
{
    private $conn;
    private $table = "watchlist";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getWatchlistByUser($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_users = :userId");
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addToWatchlist($userId, $filmId)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_users, id_film, added_at) 
        VALUES (:userId, :filmId, CURRENT_TIMESTAMP)");
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":filmId", $filmId);
        return $stmt->execute();
    }

    public function removeFromWatchlist($userId, $filmId)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_users = :userId AND id_film = :filmId");
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":filmId", $filmId);
        return $stmt->execute();
    }
}
