<?php
$conn = mysqli_connect("localhost", "root", "", "db_teras_alam_ulin");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>