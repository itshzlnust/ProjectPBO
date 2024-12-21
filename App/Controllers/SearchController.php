<?php
require_once './App/Models/Film.php';


class SearchController
{
    protected $filmModel;

    public function __construct()
    {
        $this->filmModel = new Film();
    }

    public function home()
    {
        if (isset($_GET['query'])) {
            $query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $films = $this->filmModel->searchFilms($query);
        } else {
            $films = [];
        }
        foreach ($films as $film) {
            echo "{$film->title}<br>";
        }

        require_once "./App/Views/Users/Search/Index.php";
    }
}
