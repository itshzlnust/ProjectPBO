<?php
class Film
{
    private $conn;
    private $table = "film";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllFilms()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFilm($title, $synopsis, $director, $duration)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (title_film, synopsis, director, duration) 
        VALUES (:title, :synopsis, :director, :duration)");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":synopsis", $synopsis);
        $stmt->bindParam(":director", $director);
        $stmt->bindParam(":duration", $duration, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getFilmById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_film = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchFilms($query)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE title_film LIKE :query");
        $searchTerm = "%$query%";
        $stmt->bindParam(":query", $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteFilm($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_film = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function updateFilm($id, $title, $synopsis, $director, $duration)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET title_film = :title, synopsis = :synopsis, director = :director, duration = :duration WHERE id_film = :id");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":synopsis", $synopsis);
        $stmt->bindParam(":director", $director);
        $stmt->bindParam(":duration", $duration);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function getFilmByGenre($genreId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE genre_id = :genre_id");
        $stmt->bindParam(":genre_id", $genreId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
