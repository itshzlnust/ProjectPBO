<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Admin</title>
</head>

<body>
    <h1>Edit Admin</h1>
    <form action="index.php?url=admin/edit_admin&id=<?php echo $admin['id_admin']; ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $admin['username']; ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $admin['email']; ?>" required><br>

        <button type="submit">Update Admin</button>
    </form>
</body>

</html>