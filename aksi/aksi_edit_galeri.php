<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/galeri.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);
$keterangan = trim($_POST['keterangan'] ?? '');

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
    $stmt = mysqli_prepare($conn, "UPDATE galeri SET gambar = ?, keterangan = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $gambarBaru, $keterangan, $id);
} else {
    $stmt = mysqli_prepare($conn, "UPDATE galeri SET keterangan = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $keterangan, $id);
}

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/galeri.php');
    exit;
} else {
    echo "Gagal mengedit galeri: " . mysqli_error($conn);
}
?>