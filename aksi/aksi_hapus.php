<?php
require __DIR__ . '/../config/koneksi.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = mysqli_prepare($conn, "DELETE FROM wisata WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/wisata.php');
    exit;
} else {
    echo "Gagal menghapus data wisata: " . mysqli_error($conn);
}
?>