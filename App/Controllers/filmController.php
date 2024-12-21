<?php
class FilmController
{

    public function manageFilms()
    {
        $filmModel = new Film();
        $filmModel->getAllFilms();
        require_once "./App/Views/Admin/Manage/film.php";
    }
    public function addFilm()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_NUMBER_INT);

            $filmModel = new Film();
            $filmModel->addFilm($title, $synopsis, $director, $duration);
            header("Location: index.php?url=admin/manage_films");
        } else {
            require_once "./App/Views/Admin/Manage/addFilm.php";
        }
    }

    public function editFilm($id_film)
    {
        $filmModel = new Film();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_NUMBER_INT);

            $filmModel->updateFilm($id_film, $title, $synopsis, $director, $duration);
            header("Location: index.php?url=admin/manage_films");
        } else {
            $film = $filmModel->getFilmById($id_film);
            require_once "./App/Views/Admin/Manage/editFilm.php";
        }
    }


    public function addReleaseYear()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $filmId = $_POST["film_id"];
            $releaseYear = $_POST["release_year"];
            $releaseYearModel = new ReleaseYear();
            $releaseYearModel->addReleaseYear($filmId, $releaseYear);
            header("Location: index.php?url=film/manage_release_years");
        }
    }

    public function deleteFilm($filmId)
    {
        $filmModel = new Film();
        $filmModel->deleteFilm($filmId);
        header("Location: index.php?url=admin/manage_films");
    }

    public function showAddFilmForm()
    {
        require_once "./App/Views/Admin/Manage/addFilm.php";
    }

    public function showAddReleaseYearForm()
    {
        require_once "./App/Views/Admin/Manage/addYear.php";
    }

    public function getFilmByGenre($genreId)
    {
        $filmModel = new Film();
        $films = $filmModel->getFilmByGenre($genreId);
        require_once "./App/Views/User/Genre/films.php";
        // Use the $films variable in the view
        foreach ($films as $film) {
            echo $film->title . "<br>";
        }
    }

    public function Detail()
    {
        if (isset($_GET['film_id'])) {
            $filmId = $_GET['film_id'];
            $filmModel = new Film();
            $film = $filmModel->getFilmById($filmId);

            if ($film) {
                require_once "./App/Views/Users/FilmDetails/index.php";

                if (is_array($film)) {
                    echo "Title: " . $film['title'] . "<br>";
                    echo "Synopsis: " . $film['synopsis'] . "<br>";
                    echo "Director: " . $film['director'] . "<br>";
                    echo "Duration: " . $film['duration'] . " minutes<br>";
                } elseif (is_object($film)) {
                    echo "Title: " . $film->title . "<br>";
                    echo "Synopsis: " . $film->synopsis . "<br>";
                    echo "Director: " . $film->director . "<br>";
                    echo "Duration: " . $film->duration . " minutes<br>";
                }
            } else {
                echo "Film not found.";
            }
        } else {
            echo "Film ID not provided.";
        }
    }
}
