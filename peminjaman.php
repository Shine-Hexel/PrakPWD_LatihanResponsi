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
    <div>
        <?php include 'navbar.php'; ?>
    </div>
    <div class="container-fluid banner">
        <div class="container mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Data Peminjaman</h2>
                    <div class="d-flex justify-content-end">
                        <a href="formPinjam.php" class="btn btn-secondary mb-3">Catat Peminjaman</a>
                    </div>
                    <table class="table">
                        <tr class="table-info">
                            <th>ID</th>
                            <th>Kode Peminjaman</th>
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $data = mysqli_query($conn, "SELECT peminjaman.*, buku.judul_buku FROM peminjaman JOIN buku ON peminjaman.id_buku=buku.id_buku;");
                        while ($d = mysqli_fetch_array($data)) { ?>
                            <tr>
                                <td style="font-weight: bold;"><?= $d['id_peminjaman']; ?></td>
                                <td><?= $d['kode_peminjaman']; ?></td>
                                <td><?= $d['nama_peminjam']; ?></td>
                                <td><?= $d['judul_buku']; ?></td>
                                <td><?= $d['tanggal_pinjam']; ?></td>
                                <td><?= $d['tanggal_kembali']; ?></td>
                                <td><?= $d['status']; ?></td>
                                <td>
                                    <?php if ($d['status'] == 'Dipinjam'): ?>
                                        <a href="prosesPinjam.php?kembali=<?= $d['id_peminjaman']; ?>&buku=<?= $d['id_buku']; ?>"
                                            class="btn btn-primary btn-sm"
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
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>