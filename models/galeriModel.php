<?php
require_once __DIR__ . '/../config/koneksi.php';

function getGaleri() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM galeri");
}