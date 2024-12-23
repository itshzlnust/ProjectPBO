<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synopsis App</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?url=user/watchlist">Watchlist</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="index.php?url=user/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="index.php?url=auth/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>