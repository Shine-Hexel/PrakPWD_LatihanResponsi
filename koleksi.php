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
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2 class="mb-4">Koleksi Buku</h2>
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Buku</button>
        <table class="table">
            <tr class="table-primary-bordered">
                <th scope="col">ID</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Stok</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>

            <?php
            $data = mysqli_query($conn, "SELECT * FROM buku");
            while ($d = mysqli_fetch_array($data)) {
                if ($d['stok'] > 0) {
                    $status = "Habis wak";
                } elseif ($d['stok'] <= 5) {
                    $status = "Stok menipis nich";
                } else {
                    $status = "Tersedia :v";
                }
                ?>
                <tr>
                    <td><?= $d['id_buku']; ?></td>
                    <td><?= $d['kode_buku']; ?></td>
                    <td><?= $d['judul_buku']; ?></td>
                    <td><?= $d['pengarang']; ?></td>
                    <td><?= $d['kategori']; ?></td>
                    <td><?= $d['stok']; ?></td>
                    <td><?= $status; ?></td>
                    <td>
                        <a href="proses_buku.php?hapus=<?= $d['id_buku']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin nih ente hapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- yg ini modal buat nambah buku -->
        <div class="modal fade" id="tambahModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <form action="proses_buku.php" method="POST">
                            <h5 class="modal-title">Tambah Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="kode_buku" class="form-control mb-2" placeholder="Kode Buku" required>
                        <input type="text" name="judul_buku" class="form-control mb-2" placeholder="Judul Buku"
                            required>
                        <input type="text" name="pengarang" class="form-control mb-2" placeholder="Pengarang" required>
                        <select name="kategori" class="form-control mb-2 required">
                            <option>Novel</option>
                            <option>Pendidikan</option>
                            <option>Teknologi</option>
                        </select>
                        <input type="number" name="stok" class="form-control mb-2" placeholder="Stok" required>
                        <div>
                            <div class="modal-footer">
                                <button type="submit" name="tambah" class="btn btn-primary w-100">Tambah</button>
                            </div>
                        </div>
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