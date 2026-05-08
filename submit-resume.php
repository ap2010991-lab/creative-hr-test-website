<?php
require __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /index.php');
    exit;
}

$allowed = ['pdf', 'doc', 'docx'];
$storedFile = '';
if (!empty($_FILES['resume']['name']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $extension = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowed, true)) {
        die('Only PDF, DOC, and DOCX files are allowed.');
    }
    $safeName = date('YmdHis') . '-' . preg_replace('/[^a-zA-Z0-9._-]/', '-', basename($_FILES['resume']['name']));
    $target = __DIR__ . '/uploads/resumes/' . $safeName;
    if (move_uploaded_file($_FILES['resume']['tmp_name'], $target)) {
        $storedFile = '/uploads/resumes/' . $safeName;
    }
}

$entry = [
    'id' => uniqid('resume_', true),
    'date' => date('Y-m-d H:i:s'),
    'name' => trim($_POST['name'] ?? ''),
    'phone' => trim($_POST['phone'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'city' => trim($_POST['city'] ?? ''),
    'experience' => trim($_POST['experience'] ?? ''),
    'role' => trim($_POST['role'] ?? ''),
    'file' => $storedFile,
];

$resumes = read_json('resumes', []);
$resumes[] = $entry;
write_json('resumes', $resumes);

send_site_mail('New resume submission - Creative HR Service', "Name: {$entry['name']}\nPhone: {$entry['phone']}\nEmail: {$entry['email']}\nCity: {$entry['city']}\nExperience: {$entry['experience']}\nRole: {$entry['role']}\nFile: {$entry['file']}");

header('Location: /thank-you.php');
exit;
?>
