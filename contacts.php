<?php require __DIR__ . '/includes/admin-header.php'; ?>
<?php $contacts = array_reverse(read_json('contacts', [])); ?>
<h1>Enquiries</h1>
<section class="admin-card">
    <?php if (empty($contacts)): ?><p>No enquiries yet.</p><?php endif; ?>
    <?php foreach ($contacts as $contact): ?>
        <div class="admin-row">
            <div>
                <strong><?= h($contact['name']) ?></strong>
                <p><?= h($contact['phone']) ?> · <?= h($contact['email']) ?> · <?= h($contact['type']) ?></p>
                <p><?= h($contact['message']) ?></p>
                <small><?= h($contact['date']) ?></small>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<?php require __DIR__ . '/includes/admin-footer.php'; ?>
