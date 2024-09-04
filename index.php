<?php
include 'db.php';

$result = $con->query("SELECT * FROM crude");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <style>
        body { background-color: blue; color: white; font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid white; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; }
        a { color: white; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <center>
        <h1>Registered Users</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <a href="create.php">Add New User</a>
    </center>
</body>
</html>
<?php
$con->close();
?>
