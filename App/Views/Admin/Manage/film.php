<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Films</title>
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

    <!-- Manage Films Section -->
    <div class="container">
        <h2 class="text-center mb-4">Manage Films</h2>

        <!-- Add New Film Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="index.php?url=admin/addfilm" class="btn btn-primary">Add New Film</a>
        </div>

        <!-- Films Table -->
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $film): ?>
                    <tr>
                        <td><?php echo $film['title_film']; ?></td>
                        <td><?php echo $film['director']; ?></td>
                        <td><?php echo $film['duration']; ?></td>
                        <td>
                            <a href="index.php?url=admin/editfilm&filmId=<?php echo $film['id_film']; ?>" class="btn btn-sm btn-warning me-2">Edit</a> |
                            <a href="index.php?url=admin/deletefilm&filmId=<?php echo $film['id_film']; ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>