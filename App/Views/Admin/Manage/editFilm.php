<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #2c3e50;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            height: 120px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .center-text {
            text-align: center;
            margin-top: 20px;
        }

        .center-text a {
            text-decoration: none;
            color: #3498db;
            font-size: 16px;
        }

        .center-text a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>

    <h1>Edit Film</h1>

    <form action="index.php?url=admin/editFilm&filmId=<?php echo htmlspecialchars($film['id_film']); ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($film['title_film']); ?>" required>

        <label for="director">Director:</label>
        <input type="text" name="director" value="<?php echo htmlspecialchars($film['director']); ?>" required>

        <label for="duration">Duration (in minutes):</label>
        <input type="text" name="duration" value="<?php echo htmlspecialchars($film['duration']); ?>" required>

        <label for="synopsis">Synopsis:</label>
        <textarea name="synopsis" required><?php echo htmlspecialchars($film['synopsis']); ?></textarea>

        <button type="submit">Update Film</button>
    </form>

    <div class="center-text">
        <a href="index.php?url=admin/manageFilms">Back to Film List</a>
    </div>

</body>

</html>