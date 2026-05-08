<?php
session_start();
require __DIR__ . '/../includes/functions.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($email === $site['admin_email'] && hash_equals($site['admin_password_sha256'], hash('sha256', $password))) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: /admin/index.php');
        exit;
    }
    $error = 'Invalid login details.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Creative HR Service</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body class="admin-login-page">
    <form class="login-card" method="post">
        <img src="/assets/img/logo-transparent.png" alt="Creative HR Service logo">
        <h1>Admin Login</h1>
        <?php if ($error): ?><p class="error"><?= h($error) ?></p><?php endif; ?>
        <input name="email" type="email" placeholder="Admin email" required>
        <input name="password" type="password" placeholder="Password" required>
        <button class="btn primary full" type="submit">Login</button>
    </form>
</body>
</html>
