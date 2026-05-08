<?php $title = 'Resume Writing Services'; require __DIR__ . '/includes/header.php'; ?>
<section class="page-hero resume-bg">
    <p class="eyebrow">Resume Writing</p>
    <h1>Professional resumes for freshers and experienced candidates.</h1>
</section>
<section class="content-section">
    <p><?= h(page_content('resume')) ?></p>
    <div class="feature-grid">
        <article><h3>New Resume Creation</h3><p>Fresh, structured resumes built around your skills, education, experience, and preferred job role.</p></article>
        <article><h3>Resume Redesign</h3><p>Clean formatting and improved content for resumes that need a more professional presentation.</p></article>
        <article><h3>Career Documents</h3><p>Support for CV writing, cover letters, fresher resumes, experienced resumes, and LinkedIn profile optimization.</p></article>
    </div>
    <a class="btn primary" href="/index.php#resume-upload">Upload Resume</a>
</section>
<section class="content-section light-section">
    <p class="eyebrow">Resume services</p>
    <h2>Everything needed to present your career profile better.</h2>
    <div class="feature-grid">
        <article><h3>Fresher Resume</h3><p>Clear resume structure for education, projects, skills, internships, and preferred job roles.</p></article>
        <article><h3>Experienced Resume</h3><p>Professional CV writing that highlights responsibilities, achievements, experience, and strengths.</p></article>
        <article><h3>LinkedIn & Cover Letter</h3><p>Support for LinkedIn profile improvement and cover letters for professional applications.</p></article>
    </div>
</section>
<section class="content-section">
    <p class="eyebrow">Our writing process</p>
    <h2>A clean resume starts with the right information.</h2>
    <div class="process-grid">
        <div><span>01</span><h3>Collect Details</h3><p>We review education, experience, skills, projects, achievements, and job preference.</p></div>
        <div><span>02</span><h3>Structure Content</h3><p>Information is arranged in a clean, employer-friendly resume format.</p></div>
        <div><span>03</span><h3>Improve Wording</h3><p>Profile summary, job responsibilities, and skills are written in polished English.</p></div>
        <div><span>04</span><h3>Final Resume</h3><p>You receive a professional resume suitable for job applications and recruiter review.</p></div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
