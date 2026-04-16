<?php
require_once __DIR__ . '/../config/koneksi.php';

function getFasilitas() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM fasilitas");
}
?>