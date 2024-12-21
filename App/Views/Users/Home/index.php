<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilmFinder - Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for dark IMDb-like theme */
        body {
            background-color: #4e54c8;
            color: #e6e6e6;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar styles */
        .navbar {
            background-color: #8f94fb;
        }

        .navbar-brand,
        .nav-link {
            color: #fff;
        }

        .nav-link:hover {
            color: #8f94fb;
        }

        /* Hero section with background */
        .hero-section {
            background: url('../../../../Public/img/bghome.png') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 150px 20px;
            position: relative;
        }

        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.5rem;
        }

        .hero-section a.btn {
            background-color: #4e54c8;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 5px;
        }

        /* Film card styles */
        .film-card {
            background-color: #222;
            color: #fff;
        }

        .film-card img {
            height: 400px;
            object-fit: cover;
        }

        .film-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        .card-body h5 {
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .card-body p {
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: #8f94fb;
            border: none;
            color: #fff;
        }

        /* Footer */
        footer {
            background-color: #1c1c1c;
            padding: 20px;
            text-align: center;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">FilmFinder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Top Films</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?url=watchlist/index">Watchlist</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?url=search&query=all">Search</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?url=auth/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Welcome to FilmFinder</h1>
        <p>Explore and discover your favorite films, genres, and more!</p>
        <a href="index.php?url=search&query=all" class="btn btn-warning btn-lg">Explore Now</a>
    </div>

    <!-- Filters Section -->
    <div class="container mt-5">
        <div class="row">
            <!-- Genre Filter -->
            <div class="col-md-6 genre-filter">
                <label class="form-label"><strong>Filter by Genre</strong></label>
                <select class="form-select" onchange="window.location.href=this.value">
                    <option value="index.php?url=search&query=action">Action</option>
                    <option value="index.php?url=search&query=drama">Drama</option>
                    <option value="index.php?url=search&query=comedy">Comedy</option>
                    <option value="index.php?url=search&query=horror">Horror</option>
                    <option value="index.php?url=search&query=thriller">Thriller</option>
                    <option value="index.php?url=search&query=romance">Romance</option>
                    <option value="index.php?url=search&query=sci-fi">Sci-Fi</option>
                    <option value="index.php?url=search&query=fantasy">Fantasy</option>
                    <option value="index.php?url=search&query=other">Other</option>
                </select>
            </div>
            <!-- Year Filter -->
            <div class="col-md-6 year-filter">
                <label class="form-label"><strong>Filter by Year</strong></label>
                <select class="form-select" onchange="window.location.href=this.value">
                    <option value="index.php?url=search&year=2024">2024</option>
                    <option value="index.php?url=search&year=2023">2023</option>
                    <option value="index.php?url=search&year=2022">2022</option>
                    <option value="index.php?url=search&year=2021">2021</option>
                    <option value="index.php?url=search&year=2020">2020</option>
                    <option value="index.php?url=search&year=2019">2019</option>
                    <option value="index.php?url=search&year=2018">2018</option>
                    <option value="index.php?url=search&year=2017">2017</option>
                    <option value="index.php?url=search&year=2016">2016</option>
                    <option value="index.php?url=search&year=2015">2015</option>
                    <option value="index.php?url=search&year=2014">2014</option>
                    <option value="index.php?url=search&year=2013">2013</option>
                    <option value="index.php?url=search&year=2012">2012</option>
                    <option value="index.php?url=search&year=2011">2011</option>
                    <option value="index.php?url=search&year=2010">2010</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Film Display Section -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Featured Films</h2>
        <div class="row">
            <?php
            // Placeholder PHP Code to Fetch Films from Database
            $conn = new mysqli("localhost", "root", "", "Filmfinder");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch films
            $sql = "SELECT * FROM film";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($film = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">
                            <div class="card film-card">
                                <img src="../../../../Public/img/transformers one.png" class="card-img-top" alt="' . $film['title_film'] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $film['title_film'] . '</h5>
                                    <p class="card-text">' . $film['synopsis'] . '</p>
                                    <a href="index.php?url=film/detail&id=' . $film['id_film'] . '" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo '<p>No films found.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Synopsis. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>