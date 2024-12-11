<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO tasks (task_name, description, due_date, priority, user_id) 
              VALUES ('$task_name', '$description', '$due_date', '$priority', '$user_id')";
    if (mysqli_query($conn, $query)) {
        header('Location: dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tugas</title>
</head>
<body>
    <h1>Tambah Tugas Baru</h1>
    <form method="POST">
        <input type="text" name="task_name" placeholder="Nama Tugas" required>
        <textarea name="description" placeholder="Deskripsi Tugas"></textarea>
        <input type="date" name="due_date" required>
        <select name="priority">
            <option value="rendah">Rendah</option>
            <option value="sedang">Sedang</option>
            <option value="tinggi">Tinggi</option>
        </select>
        <button type="submit">Tambah Tugas</button>
    </form>
</body>
</html>
