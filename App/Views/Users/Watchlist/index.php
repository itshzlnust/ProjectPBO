<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>
    <style>
        /* Reset basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
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
            max-width: 600px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #555;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #888;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul li {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul li a {
            text-decoration: none;
            color: #e74c3c;
            background-color: #ffeded;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        ul li a:hover {
            background-color: #f8d7da;
        }

        a.back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            padding: 10px 15px;
            background-color: #eaf6ff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a.back-link:hover {
            background-color: #d4eaff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Watchlist Anda</h1>
        <?php if (empty($watchlist)): ?>
            <p>Watchlist Anda kosong.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($watchlist as $item): ?>
                    <li>
                        Film ID: <?= htmlspecialchars($item['id_film']) ?>
                        <a href="index.php?url=watchlist/remove&film_id=<?= $item['id_film'] ?>">Hapus</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <a class="back-link" href="index.php?url=film/index">Kembali ke daftar film</a>
    </div>
</body>

</html>