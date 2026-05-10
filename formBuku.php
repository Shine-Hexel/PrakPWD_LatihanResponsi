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
    <title>Tambah Buku</title>
    <link href="ambatukam.css" rel="stylesheet">
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
                    <form action="prosesBuku.php" method="POST">
                        <h2 class="mb-4 text-center">Tambah Buku</h2>
                        <p class="mb-1 mt-3">Kode Buku</p>
                        <input type="text" name="kode_buku" class="form-control mb-2" required>

                        <p class="mb-1 mt-3">Judul Buku</p>
                        <input type="text" name="judul_buku" class="form-control mb-2" required>
                        <p class="mb-1 mt-3">Pengarang</p>
                        <input type="text" name="pengarang" class="form-control mb-2" required>

                        <p class="mb-1 mt-3">Kategori</p>
                        <select name="kategori" class="form-control mb-2 required">
                            <option>Novel</option>
                            <option>Pendidikan</option>
                            <option>Teknologi</option>
                        </select>

                        <p class="mb-1 mt-3">Stok</p>
                        <input type="number" name="stok" class="form-control mb-2" required>

                        <div>
                            <div class="d-flex justify-content-center gap-2">
                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="window.history.back()">Kembali</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>