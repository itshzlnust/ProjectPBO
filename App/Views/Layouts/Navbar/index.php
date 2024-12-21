<nav>
    <ul>
        <li><a href="index.php?url=user/home">Home</a></li>
        <li><a href="index.php?url=user/watchlist">Watchlist</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="index.php?url=auth/logout">Logout</a></li>
        <?php else: ?>
            <li><a href="index.php?url=auth/login">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>