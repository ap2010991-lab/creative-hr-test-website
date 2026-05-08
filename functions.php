<?php
require_once __DIR__ . '/../config.php';

function h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function data_path($name) {
    return __DIR__ . '/../data/' . $name . '.json';
}

function read_json($name, $default = []) {
    $path = data_path($name);
    if (!file_exists($path)) {
        return $default;
    }
    $data = json_decode(file_get_contents($path), true);
    return is_array($data) ? $data : $default;
}

function write_json($name, $data) {
    file_put_contents(data_path($name), json_encode($data, JSON_PRETTY_PRINT));
}

function is_admin() {
    return !empty($_SESSION['admin_logged_in']);
}

function require_admin() {
    if (!is_admin()) {
        header('Location: /admin/login.php');
        exit;
    }
}

function send_site_mail($subject, $message) {
    global $site;
    $headers = 'From: ' . $site['email'] . "\r\n" . 'Reply-To: ' . $site['email'];
    @mail($site['email'], $subject, $message, $headers);
}

function nav_items() {
    return [
        'index.php' => 'Home',
        'about.php' => 'About Us',
        'recruitment.php' => 'Recruitment',
        'resume-writing.php' => 'Resume Writing',
        'current-jobs.php' => 'Current Jobs',
        'contact.php' => 'Contact Us',
    ];
}

function page_content($key) {
    global $pages;
    $content = read_json('content', []);
    return $content[$key] ?? ($pages[$key] ?? '');
}
?>
