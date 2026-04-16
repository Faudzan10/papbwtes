<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/fasilitas.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);
$nama = trim($_POST['nama'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');

if ($id <= 0 || $nama === '') {
    echo "Data tidak valid.";
    exit;
}

$gambarBaru = '';
$pakaiGambarBaru = false;

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
    $folderUpload = __DIR__ . '/../assets/img/';

    if (!is_dir($folderUpload)) {
        mkdir($folderUpload, 0777, true);
    }

    $namaFile = time() . '_' . basename($_FILES['gambar']['name']);
    $targetFile = $folderUpload . $namaFile;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
        $gambarBaru = $namaFile;
        $pakaiGambarBaru = true;
    } else {
        echo "Upload gambar baru gagal.";
        exit;
    }
}

if ($pakaiGambarBaru) {
    $stmt = mysqli_prepare($conn, "UPDATE fasilitas SET nama = ?, deskripsi = ?, gambar = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $deskripsi, $gambarBaru, $id);
} else {
    $stmt = mysqli_prepare($conn, "UPDATE fasilitas SET nama = ?, deskripsi = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $nama, $deskripsi, $id);
}

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/fasilitas.php');
    exit;
} else {
    echo "Gagal mengedit fasilitas: " . mysqli_error($conn);
}
?>