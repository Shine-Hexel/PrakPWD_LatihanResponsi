<?php
include 'koneksi.php';

if(isset($_POST['tambah'])){
    mysqli_query($conn, "INSERT INTO buku(kode_buku, judul_buku, pengarang, kategori, stok)
    VALUES('$_POST[kode_buku]','$_POST[judul_buku]','$_POST[pengarang]','$_POST[kategori]','$_POST[stok]')");
}

if(isset($_GET['hapus'])){
    mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$_GET[hapus]';");
}

header("Location:koleksi.php");
?>