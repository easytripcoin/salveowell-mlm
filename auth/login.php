<?php require_once __DIR__ . '/../includes/header.php'; ?>
<h2>Login</h2>
<?php if ($msg = flash('error')): ?>
    <div class="alert alert-danger"><?= $msg ?></div>
<?php endif; ?>
<form action="" method="POST" class="needs-validation" novalidate>
    <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary">Login</button>
    <a href="forgot_password.php" class="ms-2">Forgot password?</a>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf']))
        die('CSRF error');

    $user = user_by('email', $_POST['email']);
    if ($user && verifyPassword($_POST['password'], $user['password_hash'])) {
        if (!$user['email_verified']) {
            flash('error', 'Please verify your email first.');
            redirect('auth/login.php');
        }
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        redirect('dashboard/');
    } else {
        flash('error', 'Invalid credentials.');
        redirect('auth/login.php');
    }
}
require_once __DIR__ . '/../includes/footer.php';
?>