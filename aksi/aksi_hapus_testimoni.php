<?php
require '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    mysqli_query($conn, "DELETE FROM testimoni WHERE id = '$id'");
}

header("Location: ../admin/testimoni.php");
exit;
?>