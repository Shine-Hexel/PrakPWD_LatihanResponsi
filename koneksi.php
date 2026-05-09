<?php
$conn = mysqli_connect("localhost", "root", "", "pinjam_buku");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>