<?php
session_start();
if (!isset($_SESSION['login']))
    header("Location:index.php");
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koleksi Buku</title>
    <link rel="stylesheet" href="ambatukam.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include 'navbar.php'; ?>
    </div>
    <div class="container-fluid banner">
        <div class="container mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Koleksi Buku</h2>
                    <a href="formBuku.php" class="btn btn-success mb-3">Tambah Buku</a>
                    <table class="table ">
                        <tr class="table-info">
                            <th>ID</th>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                        $data = mysqli_query($conn, "SELECT * FROM buku");
                        while ($d = mysqli_fetch_array($data)) {
                            if ($d['stok'] == 0) {
                                $status = "Habis wak";
                            } elseif ($d['stok'] <= 5 && $d['stok'] > 0) {
                                $status = "Stok menipis nich";
                            } else {
                                $status = "Tersedia :v";
                            }
                            ?>
                            <tr>
                                <td style="font-weight: bold;"><?= $d['id_buku']; ?></td>
                                <td><?= $d['kode_buku']; ?></td>
                                <td><?= $d['judul_buku']; ?></td>
                                <td><?= $d['pengarang']; ?></td>
                                <td><?= $d['kategori']; ?></td>
                                <td><?= $d['stok']; ?></td>
                                <td><?= $status; ?></td>
                                <td>
                                    <a href="editBuku.php?id=<?= $d['id_buku']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="prosesBuku.php?hapus=<?= $d['id_buku']; ?>" class="btn btn-warning btn-sm"
                                        onclick="return confirm('Yakin nih ente hapus data?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>