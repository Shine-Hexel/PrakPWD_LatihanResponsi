<?php
session_start();
if (!isset($_SESSION['login']))
    header("Location:index.php");
include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form pinjam</title>
    <link rel="stylesheet" href="ambatukam.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include 'navbar.php'; ?>
    </div>
    <div class="container-fluid banner">
        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Form Data Peminjaman Buku</h2>
                    <form action="prosesPinjam.php" method="POST" class="mb-4">
                        <p class="mb-1 mt-3">Kode Peminjaman</p>
                        <input type="text" name="kode_peminjaman" class="form-control mb-2"
                            placeholder="Kode Peminjaman" required>
                        <p class="mb-1 mt-3">Nama Peminjam</p>
                        <input type="text" name="nama_peminjam" class="form-control mb-2" placeholder="Nama Peminjam"
                            required>
                        <p class="mb-1 mt-3">Pilih Buku</p>
                        <select name="id_buku" class="form-control mb-2">
                            <?php
                            $buku = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");

                            while ($d = mysqli_fetch_array($buku)) {
                                echo "<option value='" . $d['id_buku'] . "'>" . $d['judul_buku'] . " - Stok: " . $d['stok'] . "</option>";
                            }

                            ?>

                        </select>
                        <p class="mb-1 mt-3">Tanggal Pinjam</p>
                        <input type="date" name="tanggal_pinjam" class="form-control mb-2" required>
                        <p class="mb-1 mt-3">Tanggal Kembali</p>
                        <input type="date" name="tanggal_kembali" class="form-control mb-2" required>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" name="pinjam" class="btn btn-primary">simpan</button>
                            <button type="button" class="btn btn-secondary"
                                onclick="window.history.back()">kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>