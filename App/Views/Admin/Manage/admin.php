<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Admins</title>
</head>

<body>
    <h1>Manage Admins</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?php echo $admin['username']; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td>
                    <a href="index.php?url=admin/edit_admin&id=<?php echo $admin['id_admin']; ?>">Edit</a> |
                    <a href="index.php?url=admin/delete_admin&id=<?php echo $admin['id_admin']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?url=admin/add_admin">Add Admin</a>
</body>

</html>