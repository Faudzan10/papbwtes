<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: admin/dashboard.php");
    exit;
}

$error = $_SESSION['error_login'] ?? '';
unset($_SESSION['error_login']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background:
        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)),
        url('assets/img/hero.jpg') no-repeat center center/cover;
    font-family: 'Segoe UI', sans-serif;
}

.login-box {
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    padding: 40px 30px;
    width: 380px;
    color: white;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    text-align: center;
}

.login-title {
    font-size: 28px;
    font-weight: 700;
}

.login-subtitle {
    font-size: 14px;
    opacity: 0.8;
    margin-bottom: 25px;
}

.form-control {
    border-radius: 10px;
    padding: 10px;
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
}

.form-control::placeholder {
    color: #ddd;
}

.password-wrapper {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 15px;
    top: 10px;
    cursor: pointer;
}

.btn-login {
    border-radius: 10px;
    padding: 10px;
    font-weight: 600;
    background: #198754;
    border: none;
    transition: 0.3s;
    color: white;
}

.btn-login:hover {
    background: #157347;
}

.login-link a {
    color: #ddd;
    text-decoration: none;
}

.login-link a:hover {
    color: white;
}

.alert-login {
    background: rgba(220, 53, 69, 0.18);
    border: 1px solid rgba(220, 53, 69, 0.5);
    color: #fff;
    border-radius: 10px;
    padding: 10px 12px;
    margin-bottom: 18px;
    text-align: left;
    font-size: 14px;
}
</style>
</head>

<body>

<div class="login-box">
    <div class="login-title">Teras Alam Ulin</div>
    <div class="login-subtitle">Admin Panel Login</div>

    <?php if (!empty($error)): ?>
        <div class="alert-login">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="aksi/aksi_login.php" method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>

        <div class="mb-3 password-wrapper">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <span class="password-toggle" onclick="togglePassword()">👁️</span>
        </div>

        <button type="submit" class="btn btn-login w-100">Login</button>

        <div class="login-link mt-3">
            <a href="index.php">← Kembali ke Website</a>
        </div>
    </form>
</div>

<script>
function togglePassword() {
    var pass = document.getElementById("password");
    pass.type = (pass.type === "password") ? "text" : "password";
}
</script>

</body>
</html>