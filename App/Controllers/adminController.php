<?php
require_once "./App/Models/admin.php";
require_once "./App/Models/releaseYear.php";
require_once "./App/Models/film.php";


class AdminController
{
    public function dashboard()
    {
        require_once "./App/Views/Admin/Dashboard/index.php";
    }

    public function manageFilms()
    {
        $filmModel = new Film();
        $films = $filmModel->getAllFilms();
        require_once "./App/Views/Admin/Manage/film.php";
    }

    public function manageReleaseYears()
    {
        $filmId = isset($_GET['film_id']) ? $_GET['film_id'] : null;
        $releaseYearModel = new ReleaseYear();
        $releaseYearModel->getReleaseYearByFilm($filmId);
        require_once "./App/Views/Admin/Manage/releaseYear.php";
    }

    public function addReleaseYear()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $filmId = $_POST['filmId'];
            $releaseYear = $_POST['releaseYear'];

            $releaseYearModel = new ReleaseYear();
            $releaseYearModel->addReleaseYear($filmId, $releaseYear);
            header("Location: index.php?url=admin/managereleaseyears");
        }
        require_once "./App/views/Admin/Manage/addYear.php";
    }

    public function deleteReleaseYear($releaseYearId)
    {
        $releaseYearModel = new ReleaseYear();
        $releaseYearModel->deleteReleaseYear($releaseYearId);
        header("Location: index.php?url=admin/managereleaseyears");
    }

    public function manageAdmins()
    {
        $adminModel = new Admin();
        $admins = $adminModel->getAllAdmins();
        require_once "./App/Views/Admin/Manage/admin.php";
    }

    public function addAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $adminModel = new Admin();
            $adminModel->createAdmin($username, $password, $email);
            header("Location: index.php?url=admin/manageadmins");
        }
        require_once "./App/Views/Admin/Manage/addAdmin.php";
    }

    public function editAdmin($id)
    {
        $adminModel = new Admin();
        $admin = $adminModel->getAdminById($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $adminModel->updateAdmin($id, $username, $password, $email);
            header("Location: index.php?url=admin/manageadmins");
        }

        require_once "./App/Views/Admin/Manage/editAdmin.php";
    }

    public function deleteAdmin($id)
    {
        $adminModel = new Admin();
        $adminModel->deleteAdmin($id);
        header("Location: index.php?url=admin/manageadmins");
    }

    public function addFilm()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            var_dump($_POST); // Tambahkan ini untuk debug
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $synopsis = isset($_POST['synopsis']) ? $_POST['synopsis'] : '';
            $director = isset($_POST['director']) ? $_POST['director'] : '';
            $duration = isset($_POST['duration']) ? $_POST['duration'] : '';

            $filmModel = new Film();
            $filmModel->addFilm($title, $synopsis, $director, $duration);
            header("Location: index.php?url=admin/managefilms");
        }
        require_once "./App/Views/Admin/Manage/addFilm.php";
    }
    // public function editFilm()
    // {
    //     if (!isset($_GET['film_id'])) {
    //         echo "Film ID is missing.";
    //         return;
    //     }

    //     $id_film = $_GET['film_id'];

    //     $filmModel = new Film();

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         if (empty($_POST['title']) || empty($_POST['synopsis']) || empty($_POST['director']) || empty($_POST['duration'])) {
    //             echo "All fields are required.";
    //             return;
    //         }

    //         $title = $_POST['title'];
    //         $synopsis = $_POST['synopsis'];
    //         $director = $_POST['director'];
    //         $duration = $_POST['duration'];

    //         $filmModel->updateFilm($id_film, $title, $synopsis, $director, $duration);

    //         header("Location: index.php?url=admin/managefilms");
    //         exit();
    //     } else {
    //         $film = $filmModel->getFilmById($id_film);

    //         if (!$film) {
    //             echo "Film not found.";
    //             return;
    //         }

    //         require_once "./App/Views/Admin/Manage/editFilm.php";
    //     }
    // }


    public function editFilm()
    {
        if (isset($_GET['film_id'])) {
            echo "Film ID is missing.";
            return;
        }

        $id_film = $_GET['film_id'];
        $filmModel = new Film();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_NUMBER_INT);

            $filmModel->updateFilm($id_film, $title, $synopsis, $director, $duration);
            header("Location: index.php?url=admin/managefilms");
        } else {
            require_once "./App/Views/Admin/Manage/editFilm.php";
        }
    }


    public function deleteFilm()
    {
        if (isset($_GET['filmId'])) {
            $filmId = $_GET['filmId'];
            $filmModel = new Film();
            $filmModel->deleteFilm($filmId);
            header("Location: index.php?url=admin/managefilms");
        } else {
            // Handle the error when filmId is not provided
            header("Location: index.php?url=admin/managefilms&error=missing_id");
        }
    }

    public function manageReviews()
    {
        require_once "./App/Views/Admin/Manage/reviews.php";
    }

    public function addReview()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $filmId = $_POST['film_id'];
            $reviewer = $_POST['user_id'];
            $rating = $_POST['rating'];
            $comments = $_POST['review'];

            $reviewModel = new Review();
            $reviewModel->addReview($filmId, $reviewer, $rating, $comments);
            header("Location: index.php?url=admin/manageReviews");
        }
        require_once "./App/Views/Admin/Manage/addReview.php";
    }
}
