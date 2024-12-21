<?php
class UserController
{
    public function home()
    {
        require_once "./App/Views/Users/Home/index.php";
    }

    public function filmDetail($filmId)
    {
        $filmModel = new Film();
        $film = $filmModel->getFilmById($filmId);
        $releaseYearModel = new ReleaseYear();
        $releaseYear = $releaseYearModel->getReleaseYearByFilm($filmId);
        // Use the variables in the view
        $data = ['film' => $film, 'releaseYear' => $releaseYear];
        extract($data);
        require_once "./App/Views/Users/FilmDetails/index.php";
    }

    public function search($query)
    {
        $filmModel = new Film();
        $films = $filmModel->searchFilms($query);
        require_once "./App/Views/Users/Search/index.php";
        // Use the variable in the view
        $data = ['films' => $films];
        extract($data);
    }
}
