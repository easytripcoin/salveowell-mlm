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
<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <a href="<?= BASE_URL ?>products/catalog.php" class="btn btn-outline-info w-100">Shop Products</a>
    </div>
    <div class="col-md-6 mb-3">
        <a href="<?= BASE_URL ?>products/cart.php" class="btn btn-outline-warning w-100">View Cart</a>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>