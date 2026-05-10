<?php 
include 'koneksi.php';

if(isset($_POST['update'])){
    mysqli_query($conn, "UPDATE buku SET kode_buku='$_POST[kode_buku]', judul_buku='$_POST[judul_buku]', pengarang='$_POST[pengarang]', kategori='$_POST[kategori]', stok='$_POST[stok]' WHERE id_buku='$_POST[id]'");
}

header("Location:koleksi.php");

?>