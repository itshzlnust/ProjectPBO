<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Film</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* Light gray background */
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Form Container -->
    <div class="form-container">
        <h2 class="text-center mb-4">Add New Film</h2>
        <form action="index.php?url=admin/addFilm" method="POST">
            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-film"></i></span>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter film title" required>
                </div>
            </div>
            <!-- Director Field -->
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="director" name="director" placeholder="Enter director's name" required>
                </div>
            </div>
            <!-- Duration Field -->
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (Hours)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                    <input type="number" step="0.1" class="form-control" id="duration" name="duration" placeholder="Enter duration" required>
                </div>
            </div>
            <!-- Synopsis Field -->
            <div class="mb-4">
                <label for="synopsis" class="form-label">Synopsis</label>
                <textarea class="form-control" id="synopsis" name="synopsis" rows="4" placeholder="Write the film synopsis here..."></textarea>
            </div>
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Add Film</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>