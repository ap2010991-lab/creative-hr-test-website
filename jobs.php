<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/../includes/functions.php';
require_admin();
$jobs = read_json('jobs', []);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jobs[] = [
        'id' => uniqid('job_', true),
        'title' => trim($_POST['title'] ?? ''),
        'location' => trim($_POST['location'] ?? ''),
        'experience' => trim($_POST['experience'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
        'date' => date('Y-m-d'),
    ];
    write_json('jobs', $jobs);
    header('Location: /admin/jobs.php');
    exit;
}
if (isset($_GET['delete'])) {
    $jobs = array_values(array_filter($jobs, fn($job) => $job['id'] !== $_GET['delete']));
    write_json('jobs', $jobs);
    header('Location: /admin/jobs.php');
    exit;
}
require __DIR__ . '/includes/admin-header.php';
?>
<h1>Jobs</h1>
<form class="admin-card admin-form" method="post">
    <h2>Add Job</h2>
    <input name="title" placeholder="Job title" required>
    <input name="location" placeholder="Location" required>
    <input name="experience" placeholder="Experience" required>
    <textarea name="description" rows="4" placeholder="Job description" required></textarea>
    <button class="btn primary" type="submit">Add Job</button>
</form>
<section class="admin-card">
    <h2>Published Jobs</h2>
    <?php if (empty($jobs)): ?><p>No jobs added yet.</p><?php endif; ?>
    <?php foreach ($jobs as $job): ?>
        <div class="admin-row">
            <div><strong><?= h($job['title']) ?></strong><p><?= h($job['location']) ?> · <?= h($job['experience']) ?></p></div>
            <a class="danger" href="/admin/jobs.php?delete=<?= h($job['id']) ?>">Delete</a>
        </div>
    <?php endforeach; ?>
</section>
<?php require __DIR__ . '/includes/admin-footer.php'; ?>
