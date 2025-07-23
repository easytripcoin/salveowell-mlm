<?php
require_once __DIR__ . '/../includes/header.php';
$link = BASE_URL . 'auth/register.php?ref=' . $_SESSION['username'];
?>
<h2>Your Referral Link</h2>
<div class="card">
    <div class="card-body">
        <p>Copy and share:</p>
        <input type="text" class="form-control" value="<?= $link ?>" readonly onclick="this.select()">
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>