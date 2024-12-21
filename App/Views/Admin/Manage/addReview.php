<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Review</title>
    <style>
        /* Include styles similar to the reviews.php */
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
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #2c3e50;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #2980b9;
        }

        .center-text {
            text-align: center;
            margin-top: 30px;
        }

        .center-text a {
            color: #2c3e50;
            text-decoration: none;
            font-size: 16px;
        }

        .center-text a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>

    <h1>Add New Review</h1>

    <form action="index.php?url=admin/addReview" method="post">
        <label for="user_id">Film ID:</label>
        <input type="number" id="film_id" name="film_id" required>

        <label for="film_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>

        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" required>

        <input type="submit" value="Submit Review">
        <input type="reset" value="Reset Form">
    </form>

    <div class="center-text">
        <a href="index.php?url=admin/manageReviews">Back to Reviews List</a>
    </div>

</body>

</html>