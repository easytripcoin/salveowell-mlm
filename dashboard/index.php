<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}
require_once __DIR__ . '/../includes/header.php';
?>
<h2>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>!</h2>
<p>This is your basic dashboard. PHASE 1A complete 😎</p>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>