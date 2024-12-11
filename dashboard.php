<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM tasks WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard Pengguna</h1>
    <a href="add_task.php">Tambah Tugas Baru</a>
    <h2>Daftar Tugas</h2>
    <ul>
        <?php while ($task = mysqli_fetch_assoc($result)): ?>
            <li><?= $task['task_name'] ?> - <?= $task['due_date'] ?> - <?= $task['priority'] ?>
                <a href="edit_task.php?id=<?= $task['id'] ?>">Edit</a>
                <a href="delete_task.php?id=<?= $task['id'] ?>">Hapus</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
