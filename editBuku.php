<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
    $d = mysqli_fetch_array($data);
} else {
    header("Location:koleksi.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="ambatukam.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Edit Buku</title>
</head>

<body>
    <div>
        <?php include 'navbar.php'; ?>
    </div>
    <div class="container-fluid banner">
        <div class="container mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Edit Data Buku</h2>
                    <form action="prosesBuku.php" method="POST">
                        <input type="hidden" name="id_buku" value="<?= $d['id_buku']; ?>">
                        <p class="mb-1 mt-3">Kode Buku</p>
                        <input type="text" name="kode_buku" class="form-control mb-2" placeholder="Kode Buku"
                            value="<?= $d['kode_buku']; ?>" required>
                        <p class="mb-1 mt-3">Judul Buku</p>
                        <input type="text" name="judul_buku" class="form-control mb-2" placeholder="Judul Buku"
                            value="<?= $d['judul_buku']; ?>" required>
                        <p class="mb-1 mt-3">Pengarang</p>
                        <input type="text" name="pengarang" class="form-control mb-2" placeholder="Pengarang"
                            value="<?= $d['pengarang']; ?>" required>
                        <p class="mb-1 mt-3">Kategori</p>
                        <input type="text" name="kategori" class="form-control mb-2" placeholder="Kategori"
                            value="<?= $d['kategori']; ?>" required>
                        <p class="mb-1 mt-3">Stok</p>
                        <input type="number" name="stok" class="form-control mb-2" placeholder="Stok"
                            value="<?= $d['stok']; ?>" required>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary"
                                onclick="window.history.back()">Kembali</button>
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