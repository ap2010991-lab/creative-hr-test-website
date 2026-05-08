<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/../includes/functions.php';
require_admin();
$content = read_json('content', []);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (['home_intro', 'about', 'recruitment', 'resume'] as $key) {
        $content[$key] = trim($_POST[$key] ?? '');
    }
    write_json('content', $content);
    header('Location: /admin/pages.php?saved=1');
    exit;
}
require __DIR__ . '/includes/admin-header.php';
?>
<h1>Page Content</h1>
<?php if (isset($_GET['saved'])): ?><p class="success">Content updated.</p><?php endif; ?>
<form class="admin-card admin-form" method="post">
    <label>Home Introduction<textarea name="home_intro" rows="4"><?= h(page_content('home_intro')) ?></textarea></label>
    <label>About Us<textarea name="about" rows="6"><?= h(page_content('about')) ?></textarea></label>
    <label>Recruitment<textarea name="recruitment" rows="6"><?= h(page_content('recruitment')) ?></textarea></label>
    <label>Resume Writing<textarea name="resume" rows="6"><?= h(page_content('resume')) ?></textarea></label>
    <button class="btn primary" type="submit">Save Content</button>
</form>
<?php require __DIR__ . '/includes/admin-footer.php'; ?>
