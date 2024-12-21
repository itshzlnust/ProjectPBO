<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Search</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }

        .search-section {
            padding: 50px 20px;
            text-align: center;
        }

        .results-section {
            margin-top: 30px;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .no-results {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- Search Section -->
    <div class="container search-section">
        <h1>Search Films</h1>
        <form method="GET" action="index.php">
            <input type="hidden" name="url" value="search">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="query" placeholder="Enter film title or genre..." required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning w-100">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container results-section">
        <div class="row">
            <?php if (!empty($films)) : ?>
                <?php foreach ($films as $film) : ?>
                    <div class="col-md-3 mb-4">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($film['title_film']) ?></h5>
                                <p class="card-text">Director: <?= htmlspecialchars($film['director']) ?></p>
                                <p class="card-text">Duration: <?= htmlspecialchars($film['duration']) ?> mins</p>
                                <a href="index.php?url=film/detail&filmId=<?= htmlspecialchars($film['id_film']) ?>" class="btn btn-primary btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="no-results">
                    <h3>No films found.</h3>
                    <a href="index.php?url=film/list" class="btn btn-secondary mt-3">Back to Film List</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>