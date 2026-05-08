<?php require __DIR__ . '/includes/admin-header.php'; ?>
<?php $jobs = read_json('jobs', []); $resumes = read_json('resumes', []); $contacts = read_json('contacts', []); ?>
<h1>Dashboard</h1>
<div class="admin-stats">
    <div><strong><?= count($jobs) ?></strong><span>Jobs</span></div>
    <div><strong><?= count($resumes) ?></strong><span>Resume Uploads</span></div>
    <div><strong><?= count($contacts) ?></strong><span>Enquiries</span></div>
</div>
<section class="admin-card">
    <h2>Admin access</h2>
    <p>This private panel is not linked in the public website menu. Use it to manage jobs, view resumes, read enquiries, and update page content.</p>
</section>
<?php require __DIR__ . '/includes/admin-footer.php'; ?>
