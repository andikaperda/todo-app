<?php
include 'db.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
}

$query = "SELECT tasks.*, users.name as user_name 
          FROM tasks 
          JOIN users ON tasks.user_id = users.id";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <h2>Daftar Semua Tugas</h2>
    <ul>
        <?php while ($task = mysqli_fetch_assoc($result)): ?>
            <li>
                <?= $task['task_name'] ?> (<?= $task['user_name'] ?>) - <?= $task['due_date'] ?> - <?= $task['priority'] ?>
                <br>
                Deskripsi: <?= $task['description'] ?>
                <br>
                Status: <?= $task['status'] ?>
                <a href="edit_task.php?id=<?= $task['id'] ?>">Edit</a>
                <a href="delete_task.php?id=<?= $task['id'] ?>">Hapus</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
