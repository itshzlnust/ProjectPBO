<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container">
        <h2 class="text-center mb-4">Welcome to the Admin Dashboard</h2>
        <div class="row justify-content-center">

            <!-- Manage Films -->
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Films</h5>
                        <p class="card-text">Manage all films in the database, add, edit, or delete.</p>
                        <a href="index.php?url=admin/managefilms" class="btn btn-primary">Go to Films</a>
                    </div>
                </div>
            </div>

            <!-- Manage Reviews -->
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Reviews</h5>
                        <p class="card-text">Review user-submitted feedback for films.</p>
                        <a href="index.php?url=admin/managereviews" class="btn btn-success">Go to Reviews</a>
                    </div>
                </div>
            </div>

            <!-- Manage Release Years -->
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Release Years</h5>
                        <p class="card-text">Edit and organize film release years.</p>
                        <a href="index.php?url=admin/managereleaseyears" class="btn btn-warning">Go to Release Years</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>