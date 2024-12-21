<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
</head>

<body>
    <h1>Add New Admin</h1>
    <form action="index.php?url=admin/add_admin" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">Add Admin</button>
    </form>
</body>

</html>