<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../auth/referral_capture.php';

$sponsorId = captureReferral();
$sponsor = $sponsorId ? user_by('id', $sponsorId) : null;
?>
<h2>Register</h2>
<?php if ($msg = flash('error')): ?>
    <div class="alert alert-danger"><?= $msg ?></div>
<?php endif; ?>
<?php if ($sponsor): ?>
    <div class="alert alert-info">Referrer: <?= htmlspecialchars($sponsor['full_name']) ?></div>
<?php endif; ?>
<form action="register_process.php<?= $sponsor ? '?ref=' . $sponsor['username'] : '' ?>" method="POST"
    class="needs-validation" novalidate>
    <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
    <div class="mb-3">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" minlength="6" required>
    </div>
    <button class="btn btn-primary">Create Account</button>
</form>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>