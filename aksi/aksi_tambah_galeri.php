<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/galeri.php');
    exit;
}

$keterangan = trim($_POST['keterangan'] ?? '');
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
        echo "Upload gambar galeri gagal.";
        exit;
    }
} else {
    echo "File gambar wajib diupload.";
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO galeri (gambar, keterangan) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $gambar, $keterangan);

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/galeri.php');
    exit;
} else {
    echo "Gagal menambahkan galeri: " . mysqli_error($conn);
}
?>