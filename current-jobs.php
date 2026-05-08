<?php $title = 'Current Jobs'; require __DIR__ . '/includes/header.php'; $jobs = read_json('jobs', []); ?>
<section class="page-hero">
    <p class="eyebrow">Current Jobs</p>
    <h1>Openings from Creative HR Service.</h1>
</section>
<section class="content-section">
    <?php if (empty($jobs)): ?>
        <div class="empty-state">
            <h2>Current openings will be updated soon.</h2>
            <p>Upload your resume and our team will contact you when a suitable opportunity is available.</p>
            <a class="btn primary" href="/index.php#resume-upload">Upload Resume</a>
        </div>
    <?php else: ?>
        <div class="job-list">
            <?php foreach ($jobs as $job): ?>
                <article class="job-card">
                    <h2><?= h($job['title']) ?></h2>
                    <p><?= h($job['location']) ?> · <?= h($job['experience']) ?></p>
                    <p><?= h($job['description']) ?></p>
                    <a class="btn secondary" href="/index.php#resume-upload">Apply Now</a>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<section class="content-section light-section">
    <p class="eyebrow">Stay connected</p>
    <h2>Upload once, stay available for future openings.</h2>
    <p>Even when current openings are not listed publicly, our team can keep your resume for future matching. Candidates from Vapi and nearby areas can share their updated resume, preferred role, experience, and city preference.</p>
    <div class="feature-grid">
        <article><h3>Future Job Updates</h3><p>Submitted resumes are available to our team when suitable requirements come in.</p></article>
        <article><h3>Better Matching</h3><p>Clear details like role, experience, location, and salary expectation help us understand fit.</p></article>
        <article><h3>Quick Contact</h3><p>Keep your phone number and email updated so our team can reach you quickly.</p></article>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
