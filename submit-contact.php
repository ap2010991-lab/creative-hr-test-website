<?php
require __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact.php');
    exit;
}

$entry = [
    'id' => uniqid('contact_', true),
    'date' => date('Y-m-d H:i:s'),
    'name' => trim($_POST['name'] ?? ''),
    'phone' => trim($_POST['phone'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'type' => trim($_POST['type'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
];

if ($entry['name'] === '' || $entry['phone'] === '' || $entry['email'] === '') {
    die('Name, mobile number, and email address are compulsory.');
}

if (!preg_match('/^[0-9]{10}$/', $entry['phone'])) {
    die('Please enter a valid 10 digit mobile number.');
}

if (!filter_var($entry['email'], FILTER_VALIDATE_EMAIL)) {
    die('Please enter a valid email address.');
}

$contacts = read_json('contacts', []);
$contacts[] = $entry;
write_json('contacts', $contacts);

send_site_mail('New website enquiry - Creative HR Service', "Name: {$entry['name']}\nPhone: {$entry['phone']}\nEmail: {$entry['email']}\nType: {$entry['type']}\nMessage: {$entry['message']}");

$whatsappMessage = "New enquiry from Creative HR Service website\n"
    . "Name: {$entry['name']}\n"
    . "Phone: {$entry['phone']}\n"
    . "Email: {$entry['email']}\n"
    . "Enquiry Type: {$entry['type']}\n"
    . "Message: {$entry['message']}";

header('Location: https://wa.me/919327434300?text=' . rawurlencode($whatsappMessage));
exit;
?>
