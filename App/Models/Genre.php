<?php
class Genre
{
    private $conn;
    private $table = "genre";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getGenresByFilm($filmId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_film = :filmId");
        $stmt->bindParam(":filmId", $filmId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGenre($filmId, $genre)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_film, genre) VALUES (:filmId, :genre)");
        $stmt->bindParam(":filmId", $filmId);
        $stmt->bindParam(":genre", $genre);
        return $stmt->execute();
    }

    public function deleteGenre($genreId)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_genre = :genreId");
        $stmt->bindParam(":genreId", $genreId);
        return $stmt->execute();
    }
}
