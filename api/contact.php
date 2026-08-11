<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$focus = trim($_POST['focus'] ?? '');
$source = trim($_POST['source'] ?? 'contact');

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Email and message are required.']);
    exit;
}

if ($focus !== '') {
    $message = "[Focus: {$focus}] " . $message;
}

$to = 'techmorahsolution@gmail.com';
$subject = $source === 'consultation' ? 'TechMorah consultation request' : 'TechMorah contact form';
$body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nSource: {$source}\n\n{$message}";
$headers = "From: TechMorah Site <noreply@techmorah.local>\r\nReply-To: {$email}\r\n";

$sent = @mail($to, $subject, $body, $headers);

$storageDir = dirname(__DIR__) . '/storage';
if (!is_dir($storageDir)) {
    @mkdir($storageDir, 0755, true);
}
@file_put_contents(
    $storageDir . '/contacts-' . date('Y-m-d') . '.log',
    date('c') . "\t{$email}\t{$source}\t" . str_replace("\n", ' ', $message) . "\n",
    FILE_APPEND
);

echo json_encode([
    'success' => true,
    'message' => "Message received! We'll respond shortly.",
]);
