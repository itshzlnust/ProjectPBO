<?php
class ReleaseYear
{
    private $conn;
    private $table = "release_year";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function addReleaseYear($filmId, $releaseYear)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_film, release_year) 
        VALUES (:filmId, :releaseYear)");
        $stmt->bindParam(":filmId", $filmId);
        $stmt->bindParam(":releaseYear", $releaseYear);
        return $stmt->execute();
    }

    public function getReleaseYearByFilm($filmId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_film = :filmId");
        $stmt->bindParam(":filmId", $filmId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteReleaseYear($releaseYearId)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = :releaseYearId");
        $stmt->bindParam(":releaseYearId", $releaseYearId);
        return $stmt->execute();
    }
}
