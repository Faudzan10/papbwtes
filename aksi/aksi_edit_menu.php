<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/menu.php');
    exit;
}

$id        = (int)($_POST['id'] ?? 0);
$nama_menu = trim($_POST['nama_menu'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');
$harga     = trim($_POST['harga'] ?? '');

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
    $stmt = mysqli_prepare($conn, "UPDATE menu SET nama_menu = ?, deskripsi = ?, harga = ?, gambar = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssisi", $nama_menu, $deskripsi, $harga, $gambarBaru, $id);
} else {
    $stmt = mysqli_prepare($conn, "UPDATE menu SET nama_menu = ?, deskripsi = ?, harga = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssii", $nama_menu, $deskripsi, $harga, $id);
}

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/menu.php');
    exit;
} else {
    echo "Gagal mengedit menu: " . mysqli_error($conn);
}
?>