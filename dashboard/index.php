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
<h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<div class="row">
    <div class="col-md-6 mb-3">
        <a href="referral_link.php" class="btn btn-outline-primary w-100">My Referral Link</a>
    </div>
    <div class="col-md-6 mb-3">
        <a href="genealogy.php" class="btn btn-outline-success w-100">View Genealogy</a>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>