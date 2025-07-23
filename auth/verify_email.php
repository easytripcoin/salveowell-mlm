<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../includes/db_functions.php';

$token = $_GET['token'] ?? '';
$user = user_by('verification_token', $token);

if (!$user)
    die('Invalid or expired token.');

$stmt = db()->prepare("UPDATE users SET email_verified = 1, verification_token = NULL WHERE id = ?");
$stmt->execute([$user['id']]);

echo "Email verified! <a href='" . BASE_URL . "auth/login.php'>Login now</a>";