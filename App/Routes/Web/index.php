<?php

// Add error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sanitize URL input
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING) ?? 'user/home';

switch ($url) {
    case 'admin/dashboard':
        require_once __DIR__ . '/../../Controllers/adminController.php';
        $controller = new AdminController();
        $controller->dashboard();
        break;

    case 'user/home':
        require_once __DIR__ . '/../../Controllers/UserController.php';
        $controller = new UserController();
        $controller->home();
        break;

    case 'film/add':
        require_once __DIR__ . '/../../Controllers/filmController.php';
        $controller = new FilmController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addFilm();
        } else {
            $controller->showAddFilmForm();
        }
        break;

    case 'film/add_release_year':
        require_once __DIR__ . '/../../Controllers/filmController.php';
        $controller = new FilmController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addReleaseYear();
        } else {
            $controller->showAddReleaseYearForm();
        }
        break;

    case 'search':
        $query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_STRING);
        require_once __DIR__ . '/../../Controllers/UserController.php';
        $controller = new UserController();
        $controller->search($query);
        break;

    default:
        require_once __DIR__ . '/../../Controllers/UserController.php';
        $controller = new UserController();
        $controller->home();
        break;
}
