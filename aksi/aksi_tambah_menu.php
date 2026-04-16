<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/menu.php');
    exit;
}

$nama_menu = trim($_POST['nama_menu'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');
$harga     = trim($_POST['harga'] ?? '');

$gambar = '';

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
    $folderUpload = __DIR__ . '/../assets/img/';

    if (!is_dir($folderUpload)) {
        mkdir($folderUpload, 0777, true);
    }

    $namaFile = time() . '_' . basename($_FILES['gambar']['name']);
    $targetFile = $folderUpload . $namaFile;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
        $gambar = $namaFile;
    } else {
        echo "Upload gambar gagal.";
        exit;
    }
}

$stmt = mysqli_prepare($conn, "INSERT INTO menu (nama_menu, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssis", $nama_menu, $deskripsi, $harga, $gambar);

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/menu.php');
    exit;
} else {
    echo "Gagal menambahkan menu: " . mysqli_error($conn);
}
?>