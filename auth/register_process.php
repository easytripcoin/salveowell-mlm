<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/security.php';
require_once __DIR__ . '/../includes/db_functions.php';
require_once __DIR__ . '/../includes/email_functions.php';  // Add this line

// var_dump($_POST, $_SESSION['csrf'], $_SERVER['REQUEST_METHOD'], verify_csrf($_POST['csrf']));
// die; // Debugging line to inspect POST data, remove in production

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf($_POST['csrf'] ?? '')) {
    die('Invalid request');
}

$full_name = trim($_POST['full_name']);
$email = strtolower(trim($_POST['email']));
$password = $_POST['password'];

if (user_by('email', $email)) {
    flash('error', 'Email already registered.');
    redirect('auth/register.php');
}

$token = bin2hex(random_bytes(32));
$hash = hashPassword($password);

$stmt = db()->prepare("INSERT INTO users (full_name, email, password_hash, verification_token) VALUES (?,?,?,?)");
$stmt->execute([$full_name, $email, $hash, $token]);

// --- send verification email (simple mail for demo) ---
$link = BASE_URL . "auth/verify_email.php?token=$token";
$subject = "Verify your " . SITE_NAME . " account";
$body = "Hi $full_name,<br><br>Click here to verify:<br><a href=\"$link\">$link</a>";

// Use PHPMailer in production
// mail($email, $subject, $body, "Content-Type: text/html; charset=UTF-8\r\n");

// Send verification email using PHPMailer
if (sendVerificationEmail($email, $full_name, $token)) {
    flash('success', 'Account created. Check your email to verify.');
} else {
    flash('error', 'Account created but email could not be sent. Please contact support.');
}

flash('success', 'Account created. Check your email to verify.');
redirect('auth/login.php');