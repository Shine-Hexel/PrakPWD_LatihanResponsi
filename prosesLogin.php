<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = MD5($_POST['password']);

if (empty($username) || empty($_POST['password'])) {
    header("Location:index.php?error=kosong");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($query) > 0) {
    $_SESSION['login'] = true;
    header("Location:koleksi.php");
} else {
    header("Location:index.php?error=gagal");
}
?>