<?php
require_once '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    mysqli_query($conn, "DELETE FROM testimoni WHERE id = '$id'");
}

header("Location: testimoni.php");
exit;
?>