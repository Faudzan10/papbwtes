<?php
session_start();
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    $_SESSION['error_login'] = 'Username dan password wajib diisi.';
    header('Location: ../login.php');
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT id, username, password FROM admin WHERE username = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    $_SESSION['error_login'] = 'Username tidak ditemukan.';
    header('Location: ../login.php');
    exit;
}

if ($password !== $user['password']) {
    $_SESSION['error_login'] = 'Password salah. Silakan coba lagi.';
    header('Location: ../login.php');
    exit;
}

$_SESSION['login'] = true;
$_SESSION['admin_id'] = $user['id'];
$_SESSION['username'] = $user['username'];

header('Location: ../admin/dashboard.php');
exit;
?>