<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/../../includes/functions.php';
require_admin();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Creative HR Service</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body class="admin-page">
<aside class="admin-sidebar">
    <img src="/assets/img/logo-transparent.png" alt="Creative HR Service logo">
    <a href="/admin/index.php">Dashboard</a>
    <a href="/admin/jobs.php">Jobs</a>
    <a href="/admin/resumes.php">Resumes</a>
    <a href="/admin/contacts.php">Enquiries</a>
    <a href="/admin/pages.php">Page Content</a>
    <a href="/admin/settings.php">Settings</a>
    <a href="/admin/logout.php">Logout</a>
</aside>
<main class="admin-main">
