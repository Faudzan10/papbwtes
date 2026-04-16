<?php
header('Content-Type: application/json');
require_once '../config/koneksi.php';

$query = "SELECT id, nama_menu, harga, gambar FROM menu ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);