<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = MD5($_POST['password']);

if(empty($username) || empty($_POST['password'])) {
    header("Location: index.php?error=1");
    exit();
}

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if($result && mysqli_num_rows($result) > 0){
    $_SESSION['username'] = $username;
    header("Location: koleksi.php");
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}