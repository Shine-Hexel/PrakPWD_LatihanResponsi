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
    <title>Peminjaman Buku</title>
    <link href="ambatukam.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2 class="mb-4">Form Data Peminjaman Buku</h2>
        <form action="prosesPinjam.php" method="POST" class="mb-4">
            <input type="text" name="kode_peminjaman" class="form-control mb-2" placeholder="Kode Peminjaman" required>
            <input type="text" name="nama_peminjam" class="form-control mb-2" placeholder="Nama Peminjam" required>

            <select name="id_buku" class="form-control mb-2">
                <?php
                $buku = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");

                while ($d = mysqli_fetch_array($buku)) {
                    echo "<option value='" . $d['id_buku'] . "'>" . $d['judul_buku'] . "</option>";
                }

                ?>

            </select>

            <input type="date" name="tanggal_pinjam" class="form-control mb-2" required>
            <input type="date" name="tanggal_kembali" class="form-control mb-2" required>
            <button type="submit" name="pinjam" class="btn btn-primary">simpan</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">kembali</button>
        </form>

        <table class="table table-bordered">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            $data = mysqli_query($conn, "SELECT peminjaman.*, buku.judul_buku FROM peminjaman JOIN buku ON peminjaman.id_buku=buku.id_buku;");
            while ($d = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td><?= $d['kode_peminjaman']; ?></td>
                    <td><?= $d['nama_peminjam']; ?></td>
                    <td><?= $d['judul_buku']; ?></td>
                    <td><?= $d['status']; ?></td>
                    <td>
                        <?php if ($d['status'] == 'Dipinjam'): ?>
                            <a href="prosesPinjam.php?kembali=<?= $d['id_peminjaman']; ?>&buku=<?= $d['id_buku']; ?>"
                                class="btn btn-success btn-sm"
                                onclick="return confirm('ente yakin mau ngembaliin buku?')">Kembalikan</a>
                            <?php else: ?>
                                <span class="badge bg-success">Selesai</span>
                            <?php endif; ?>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>