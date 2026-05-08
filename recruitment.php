<?php $title = 'Recruitment Services'; require __DIR__ . '/includes/header.php'; ?>
<section class="page-hero recruitment-bg">
    <p class="eyebrow">Recruitment</p>
    <h1>Hiring support for every role, level, and department.</h1>
</section>
<section class="content-section">
    <p><?= h(page_content('recruitment')) ?></p>
    <div class="feature-grid">
        <article><h3>Freshers & Experienced</h3><p>Support for entry-level candidates, skilled workers, experienced professionals, and senior roles.</p></article>
        <article><h3>Technical & Non-Technical</h3><p>Hiring for operators, engineers, production, quality, sales, admin, HR, accounts, and office teams.</p></article>
        <article><h3>Employer Coordination</h3><p>Requirement understanding, candidate matching, interview coordination, and follow-up support.</p></article>
    </div>
    <a class="btn primary" href="/contact.php">Request Hiring Support</a>
</section>
<section class="content-section light-section">
    <p class="eyebrow">Hiring categories</p>
    <h2>Recruitment support across departments.</h2>
    <div class="category-grid">
        <span>Pharma</span><span>Chemical</span><span>Plastics</span><span>Packaging</span>
        <span>Textile</span><span>Garment</span><span>Factory Staff</span><span>Office Staff</span><span>Sales</span><span>HR & Admin</span>
        <span>Accounts</span><span>IT</span><span>Engineers</span><span>Operators</span>
        <span>Supervisors</span><span>Managers</span><span>Freshers</span><span>Experienced</span>
    </div>
</section>
<section class="content-section">
    <p class="eyebrow">Recruitment process</p>
    <h2>From requirement to interview coordination.</h2>
    <div class="process-grid">
        <div><span>01</span><h3>Requirement Brief</h3><p>We understand designation, skills, salary range, location, experience, and urgency.</p></div>
        <div><span>02</span><h3>Candidate Search</h3><p>We shortlist profiles from suitable job categories and local candidate availability.</p></div>
        <div><span>03</span><h3>Screening</h3><p>Basic profile fit, experience, communication, and interest are checked before sharing.</p></div>
        <div><span>04</span><h3>Coordination</h3><p>We help coordinate interviews and candidate follow-up so hiring stays organized.</p></div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
