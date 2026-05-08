<?php require __DIR__ . '/includes/admin-header.php'; ?>
<?php $resumes = array_reverse(read_json('resumes', [])); ?>
<h1>Resume Uploads</h1>
<section class="admin-card">
    <?php if (empty($resumes)): ?><p>No resume submissions yet.</p><?php endif; ?>
    <?php foreach ($resumes as $resume): ?>
        <div class="admin-row">
            <div>
                <strong><?= h($resume['name']) ?></strong>
                <p><?= h($resume['phone']) ?> · <?= h($resume['email']) ?> · <?= h($resume['city']) ?></p>
                <p><?= h($resume['experience']) ?> · <?= h($resume['role']) ?> · <?= h($resume['date']) ?></p>
            </div>
            <?php if (!empty($resume['file'])): ?><a class="btn secondary" href="<?= h($resume['file']) ?>" download>Download</a><?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>
<?php require __DIR__ . '/includes/admin-footer.php'; ?>
