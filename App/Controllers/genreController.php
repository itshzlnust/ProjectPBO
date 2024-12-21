<?php
class GenreController
{
    public function addGenre($filmId, $genre)
    {
        $genreModel = new Genre();
        $genreModel->addGenre($filmId, $genre);
        header("Location: index.php?url=admin/manage_films");
    }

    public function deleteGenre($genreId)
    {
        $genreModel = new Genre();
        $genreModel->deleteGenre($genreId);
        header("Location: index.php?url=admin/manage_films");
    }

    public function getGenresByFilm($filmId)
    {
        $genreModel = new Genre();
        return $genreModel->getGenresByFilm($filmId);
    }
}
