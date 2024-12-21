<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Release Years</title>
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
            padding: 6px 12px;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .action-buttons a.delete {
            background-color: #e74c3c;
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

    <h1>Manage Release Years</h1>

    <table>
        <thead>
            <tr>
                <th>Film Title</th>
                <th>Release Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($releaseYears) && is_array($releaseYears)) : ?>
                <?php foreach ($releaseYears as $releaseYear): ?>
                    <tr>
                        <td><?= htmlspecialchars($releaseYear['title_film']) ?></td>
                        <td><?= htmlspecialchars($releaseYear['release_year']) ?></td>
                        <td class="action-buttons">
                            <a class="delete" href="index.php?url=admin/deletereleaseyear&releaseYearId=<?= $releaseYear['id_release_year'] ?>" onclick="return confirm('Are you sure you want to delete this release year?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="colspan">No release years found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="center-text">
        <a href="index.php?url=admin/addreleaseyear">Add Release Year</a>
    </div>

</body>

</html>