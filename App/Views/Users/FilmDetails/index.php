<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Detail</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
            color: #555;
        }

        .film-info {
            margin-bottom: 20px;
        }

        strong {
            color: #2c3e50;
        }

        h2,
        h3 {
            margin-top: 20px;
            font-size: 24px;
            color: #3498db;
        }

        .reviews {
            margin-bottom: 20px;
        }

        .reviews div {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .reviews div p {
            margin-bottom: 5px;
        }

        form {
            margin-top: 20px;
        }

        form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        form input[type="number"] {
            padding: 10px;
            width: 100px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        form button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #2980b9;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #3498db;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Film: <?php echo $film['title_film']; ?></h1>
        <div class="film-info">
            <p><strong>Synopsis:</strong> <?php echo $film['synopsis']; ?></p>
            <p><strong>Director:</strong> <?php echo $film['director']; ?></p>
            <p><strong>Duration:</strong> <?php echo $film['duration']; ?> minutes</p>
        </div>

        <h2>Reviews</h2>
        <form action="index.php?url=user/addReview" method="POST">
            <textarea name="review" placeholder="Write your review here..." required></textarea><br>
            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" required><br>
            <button type="submit">Add Review</button>
        </form>

        <h3>All Reviews</h3>
        <div class="reviews">
            <?php foreach ($reviews as $review): ?>
                <div>
                    <p><?php echo htmlspecialchars($review['review']); ?></p>
                    <p><strong>Rating:</strong> <?php echo htmlspecialchars($review['rating']); ?>/5</p>
                </div>
            <?php endforeach; ?>
        </div>

        <a class="back-link" href="index.php?url=film/index">Back to Film List</a>
    </div>
</body>

</html>