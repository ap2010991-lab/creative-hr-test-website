</main>
<footer class="site-footer">
    <div>
        <img src="/assets/img/logo-transparent.png" alt="Creative HR Service logo" class="footer-logo">
        <p><?= h($site['tagline']) ?></p>
        <div class="social-links">
            <a href="<?= h($site['instagram_url']) ?>" target="_blank" rel="noopener">Instagram</a>
            <a href="<?= h($site['facebook_url']) ?>" target="_blank" rel="noopener">Facebook</a>
        </div>
    </div>
    <div>
        <h3>Services</h3>
        <a href="/recruitment.php">Recruitment</a>
        <a href="/resume-writing.php">Resume Writing</a>
    </div>
    <div>
        <h3>Contact</h3>
        <p><?= h($site['phone']) ?></p>
        <p><?= h($site['email']) ?></p>
        <p><?= h($site['address']) ?></p>
    </div>
</footer>
<script src="/assets/js/main.js"></script>
</body>
</html>
