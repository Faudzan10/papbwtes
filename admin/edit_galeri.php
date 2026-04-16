<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'galeri';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM galeri WHERE id = $id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Galeri</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>
</head>

<body>
<div class="admin-layout">

<?php include 'sidebar.php'; ?>

<div class="main-content">

<div class="content-card">
<h3>Edit Galeri</h3>

<form action="../aksi/aksi_edit_galeri.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<img src="../assets/img/<?= $row['gambar']; ?>" width="100" class="mb-3">

<input type="file" name="gambar" class="form-control mb-3">

<input type="text" name="keterangan" class="form-control mb-3"
value="<?= $row['keterangan']; ?>">

<button class="btn btn-success">Update</button>
<a href="galeri.php" class="btn btn-secondary">Kembali</a>

</form>
</div>

</div>
</div>
</body>
</html>