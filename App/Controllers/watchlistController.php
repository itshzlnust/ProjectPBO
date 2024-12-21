<?php
require_once "./App/Models/Watchlist.php";

class WatchlistController
{
    private $watchlistModel;

    public function __construct()
    {
        $this->watchlistModel = new Watchlist();
    }

    public function index()
    {
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?url=watchlist/index");
            exit;
        }
        $userId = $_SESSION["user"]["id_users"];
        $watchlist = $this->watchlistModel->getWatchlistByUser($userId);
        require_once "./App/Views/Watchlist/index.php";
    }

    public function add()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $filmId = $_POST["film_id"];
            $userId = $_SESSION["user"]["id_users"];
            $this->watchlistModel->addToWatchlist($userId, $filmId);
            header("Location: index.php?url=watchlist/index");
        }
    }

    public function remove()
    {
        session_start();
        if (isset($_GET["film_id"])) {
            $filmId = $_GET["film_id"];
            $userId = $_SESSION["user"]["id_users"];
            $this->watchlistModel->removeFromWatchlist($userId, $filmId);
            header("Location: index.php?url=watchlist/index");
        }
    }
}
