<?php
require __DIR__ . '/../config/koneksi.php';

$id = (int)($_GET['id'] ?? 0);

$stmtSelect = mysqli_prepare($conn, "SELECT gambar FROM menu WHERE id = ?");
mysqli_stmt_bind_param($stmtSelect, "i", $id);
mysqli_stmt_execute($stmtSelect);
$result = mysqli_stmt_get_result($stmtSelect);
$data = mysqli_fetch_assoc($result);

if ($data && !empty($data['gambar'])) {
    $filePath = __DIR__ . '/../assets/img/' . $data['gambar'];
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

$stmtDelete = mysqli_prepare($conn, "DELETE FROM menu WHERE id = ?");
mysqli_stmt_bind_param($stmtDelete, "i", $id);

if (mysqli_stmt_execute($stmtDelete)) {
    header('Location: ../admin/menu.php');
    exit;
} else {
    echo "Gagal menghapus menu: " . mysqli_error($conn);
}
?>