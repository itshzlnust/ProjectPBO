<?php
class ReviewController
{
    public function addReview($userId, $filmId, $review, $rating)
    {
        $reviewModel = new Review();
        $reviewModel->addReview($userId, $filmId, $review, $rating);
        header("Location: index.php?url=user/film_detail&filmId=$filmId");
    }

    public function updateReview($reviewId, $filmId, $review, $rating)
    {
        $reviewModel = new Review();
        $reviewModel->updateReview($reviewId, $review, $rating);
        header("Location: index.php?url=user/film_detail&filmId=$filmId");
    }

    public function deleteReview($reviewId, $filmId)
    {
        $reviewModel = new Review();
        $reviewModel->deleteReview($reviewId);
        header("Location: index.php?url=user/film_detail&filmId=$filmId");
    }

    public function viewReviews($filmId)
    {
        $reviewModel = new Review();
        $reviews = $reviewModel->getReviewsByFilm($filmId);
        return $reviews;
    }
}
