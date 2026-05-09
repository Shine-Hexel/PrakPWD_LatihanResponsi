<?php
include 'koneksi.php';

if (isset($_POST['pinjam'])) {
    mysqli_query($conn, "INSERT INTO peminjaman(kode_peminjaman, nama_peminjam, id_buku, tanggal_pinjam, tanggal_kembali)
    VALUES('$_POST[kode_peminjaman]','$_POST[nama_peminjam]','$_POST[id_buku]','$_POST[tanggal_pinjam]','$_POST[tanggal_kembali]')");

    mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id_buku='$_POST[id_buku]'");
}

if (isset($_GET['kembali'])) {
    mysqli_query($conn, "UPDATE peminjaman SET status='Dikembalikan' WHERE id_peminjaman='$_GET[kembali]'");
    mysqli_query($conn, "UPDATE buku SET stok = stok + 1 WHERE id_buku='$_GET[buku]'");
}

header("Location:peminjaman.php");
?>