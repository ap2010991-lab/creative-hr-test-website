<?php $title = 'Contact Us'; require __DIR__ . '/includes/header.php'; ?>
<section class="page-hero">
    <p class="eyebrow">Contact Us</p>
    <h1>Speak with Creative HR Service.</h1>
</section>
<section class="contact-layout">
    <form class="card-form" action="/submit-contact.php" method="post">
        <h2>Send Enquiry</h2>
        <p class="required-note">Fields marked with * are compulsory. Mobile number must be exactly 10 digits.</p>
        <label>Full name *<input name="name" placeholder="Enter your full name" required></label>
        <label>Mobile number *<input name="phone" placeholder="10 digit mobile number" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" title="Please enter exactly 10 digits" required></label>
        <label>Email address *<input name="email" type="email" placeholder="Enter your email address" required></label>
        <label>Enquiry type
        <select name="type">
            <option>Looking for a job</option>
            <option>Hiring candidates</option>
            <option>Resume writing enquiry</option>
        </select>
        </label>
        <label>Message<textarea name="message" placeholder="Message" rows="5"></textarea></label>
        <button class="btn primary full" type="submit">Submit Enquiry</button>
        <p class="form-note">After submission, WhatsApp will open with your enquiry details ready to send to Creative HR Service.</p>
    </form>
    <aside class="contact-card">
        <h2>Creative HR Service</h2>
        <p><strong>Phone:</strong> <?= h($site['phone']) ?></p>
        <p><strong>Email:</strong> <?= h($site['email']) ?></p>
        <p><strong>Address:</strong> <?= h($site['address']) ?></p>
        <div class="social-links contact-social">
            <a href="<?= h($site['instagram_url']) ?>" target="_blank" rel="noopener">Instagram</a>
            <a href="<?= h($site['facebook_url']) ?>" target="_blank" rel="noopener">Facebook</a>
        </div>
        <a class="btn secondary full" href="https://wa.me/919327434300">Chat on WhatsApp</a>
    </aside>
</section>
<section class="map-section">
    <div class="map-shell">
        <div class="map-info">
            <p class="eyebrow">Google Map</p>
            <h2>Find us in Vapi.</h2>
            <p><?= h($site['address']) ?></p>
            <a class="btn primary" target="_blank" rel="noopener" href="<?= h($site['google_maps_url']) ?>">Open in Google Maps</a>
        </div>
        <iframe
            class="map-frame"
            title="Creative HR Service location map"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps?q=<?= urlencode($site['address']) ?>&output=embed"></iframe>
    </div>
</section>
<section class="content-section">
    <p class="eyebrow">Visit or contact</p>
    <h2>We support candidates and employers from Vapi and nearby areas.</h2>
    <div class="feature-grid">
        <article><h3>Job Seekers</h3><p>Call or upload your resume for recruitment support, resume writing, and future job updates.</p></article>
        <article><h3>Employers</h3><p>Share your hiring requirement and our team will connect with you for role details.</p></article>
        <article><h3>Office Location</h3><p>Our office is located at Fortune Square 1, Vapi-Daman Road, Chala, Vapi.</p></article>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
