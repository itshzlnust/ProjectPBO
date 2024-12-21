<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #3498db;
            color: #fff;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
        }

        td {
            font-size: 16px;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .action-buttons a {
            margin-right: 10px;
            padding: 6px 12px;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .action-buttons a.edit {
            background-color: #2ecc71;
        }

        .action-buttons a.delete {
            background-color: #e74c3c;
        }

        .action-buttons a.edit:hover {
            background-color: #27ae60;
        }

        .action-buttons a.delete:hover {
            background-color: #c0392b;
        }

        td.colspan {
            text-align: center;
            font-size: 18px;
            color: #555;
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

    <h1>Manage Reviews</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Film Title</th>
                <th>Reviewer</th>
                <th>Rating</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($reviews) && is_array($reviews)) : ?>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?= htmlspecialchars($review['id']) ?></td>
                        <td><?= htmlspecialchars($review['film_id']) ?></td>
                        <td><?= htmlspecialchars($review['user_id']) ?></td>
                        <td><?= htmlspecialchars($review['review']) ?></td>
                        <td><?= htmlspecialchars($review['rating']) ?></td>
                        <td class="action-buttons">
                            <a class="edit" href="edit.php?id=<?= $review['id'] ?>">Edit</a>
                            <a class="delete" href="delete.php?id=<?= $review['id'] ?>" onclick="return confirm('Are you sure you want to delete this review?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="colspan">No reviews found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="center-text">
        <a href="index.php?url=admin/addReview">Add New Review</a>
    </div>

    <div class="center-text">
        <a href="index.php?url=admin/managefilms">Back to Film List</a>
    </div>

</body>

</html>