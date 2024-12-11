<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_app";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
