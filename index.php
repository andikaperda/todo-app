<?php
include 'db.php'; // Include untuk koneksi DB
session_start();

$tugasQuery = "SELECT * FROM tasks WHERE status = 'belum selesai'";
$tugasResult = mysqli_query($conn, $tugasQuery);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Tugas</h1>
    <div class="task-summary">
        <p>Tugas yang Belum Selesai: <?= mysqli_num_rows($tugasResult) ?></p>
        <a href="login.php">Login Admin</a> | <a href="register.php">Daftar Pengguna Baru</a>
    </div>
    <div class="task-list">
        <ul>
            <?php while ($task = mysqli_fetch_assoc($tugasResult)): ?>
                <li><?= $task['task_name'] ?> - <?= $task['due_date'] ?> - <?= $task['priority'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
    <a href="add_task.php">Tambah Tugas Baru</a>
</body>
</html>
