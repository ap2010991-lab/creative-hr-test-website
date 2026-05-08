<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/../includes/functions.php';
require_admin();
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if (strlen($password) < 8) {
        $message = 'Password must be at least 8 characters.';
    } else {
        $newHash = hash('sha256', $password);
        $configPath = __DIR__ . '/../config.php';
        $configText = file_get_contents($configPath);
        $configText = preg_replace(
            "/'admin_password_sha256' => '[a-f0-9]+'/i",
            "'admin_password_sha256' => '" . $newHash . "'",
            $configText
        );
        file_put_contents($configPath, $configText);
        $message = 'Password updated.';
    }
}
require __DIR__ . '/includes/admin-header.php';
?>
<h1>Settings</h1>
<?php if ($message): ?><p class="success"><?= h($message) ?></p><?php endif; ?>
<form class="admin-card admin-form" method="post">
    <h2>Change Admin Password</h2>
    <input name="password" type="password" placeholder="New password" required>
    <button class="btn primary" type="submit">Update Password</button>
</form>
<section class="admin-card">
    <h2>Login Details</h2>
    <p><strong>Admin email:</strong> <?= h($site['admin_email']) ?></p>
    <p>Change the password after uploading the website to hosting.</p>
</section>
<?php require __DIR__ . '/includes/admin-footer.php'; ?>
