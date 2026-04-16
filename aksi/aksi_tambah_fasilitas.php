<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/fasilitas.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');
$gambar = '';

if ($nama === '') {
    echo "Nama fasilitas wajib diisi.";
    exit;
}

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
} else {
    echo "Gambar wajib diupload.";
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO fasilitas (nama, deskripsi, gambar) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $nama, $deskripsi, $gambar);

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/fasilitas.php');
    exit;
} else {
    echo "Gagal menambahkan fasilitas: " . mysqli_error($conn);
}
?>