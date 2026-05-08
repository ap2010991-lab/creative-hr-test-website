<?php require_once __DIR__ . '/functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($title ?? $site['name']) ?> | <?= h($site['name']) ?></title>
    <meta name="description" content="<?= h($description ?? 'Recruitment and resume writing services in Vapi and nearby areas.') ?>">
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <link rel="apple-touch-icon" href="/assets/img/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://images.unsplash.com">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<div class="site-loader" aria-hidden="true">
    <div class="loader-scene">
        <img src="/assets/img/logo-mark.png" alt="">
        <span class="loader-orbit"></span>
        <span class="loader-handle"></span>
    </div>
    <p>Creative HR Service</p>
</div>
<header class="site-header">
    <a class="brand" href="/index.php" aria-label="Creative HR Service home">
        <img src="/assets/img/logo-transparent.png" alt="Creative HR Service logo">
    </a>
    <button class="menu-toggle" type="button" aria-label="Open menu">Menu</button>
    <nav class="nav">
        <?php foreach (nav_items() as $url => $label): ?>
            <a href="/<?= h($url) ?>"><?= h($label) ?></a>
        <?php endforeach; ?>
    </nav>
    <a class="header-cta" href="tel:+919327434300">Call Now</a>
</header>
<main>
