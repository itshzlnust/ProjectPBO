<?php
class Review
{
    private $conn;
    private $table = "reviewrating";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getReviewsByFilm($filmId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_film = :filmId");
        $stmt->bindParam(":filmId", $filmId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addReview($userId, $filmId, $review, $rating)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_users, id_film, review, rating) VALUES (:userId, :filmId, :review, :rating)");
        $stmt->bindValue(":userId", $userId);
        $stmt->bindValue(":filmId", $filmId);
        $stmt->bindValue(":review", $review);
        $stmt->bindValue(":rating", (float)$rating);
        return $stmt->execute();
    }

    public function updateReview($reviewId, $review, $rating)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET review = :review, rating = :rating WHERE id_review = :reviewId");
        $stmt->bindParam(":review", $review);
        $stmt->bindParam(":rating", $rating);
        $stmt->bindParam(":reviewId", $reviewId);
        return $stmt->execute();
    }

    public function deleteReview($reviewId)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_review = :reviewId");
        $stmt->bindParam(":reviewId", $reviewId);
        return $stmt->execute();
    }
}
