<?php
class ReleaseYearController
{
    public function addReleaseYear($filmId, $releaseYear)
    {
        $releaseYearModel = new ReleaseYear();
        $releaseYearModel->addReleaseYear($filmId, $releaseYear);
        header("Location: index.php?url=admin/manage_films");
    }

    public function deleteReleaseYear($releaseYearId)
    {
        $releaseYearModel = new ReleaseYear();
        $releaseYearModel->deleteReleaseYear($releaseYearId);
        header("Location: index.php?url=admin/manage_films");
    }

    public function getReleaseYearByFilm($filmId)
    {
        $releaseYearModel = new ReleaseYear();
        return $releaseYearModel->getReleaseYearByFilm($filmId);
    }
}
