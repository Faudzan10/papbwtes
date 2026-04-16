<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'galeri';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Galeri</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>
</head>

<body>
<div class="admin-layout">

<?php include 'sidebar.php'; ?>

<div class="main-content">

<div class="content-card">
<h3>Tambah Galeri</h3>

<form action="../aksi/aksi_tambah_galeri.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
    <label>Upload Gambar</label>
    <input type="file" name="gambar" class="form-control" required>
</div>

<div class="mb-3">
    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
</div>

<button class="btn btn-success">Simpan</button>
<a href="galeri.php" class="btn btn-secondary">Kembali</a>

</form>
</div>

</div>
</div>
</body>
</html>