<?php require_once __DIR__ . '/../includes/header.php'; ?>
<h2>Forgot Password</h2>
<?php if ($msg = flash('error')): ?>
    <div class="alert alert-danger"><?= $msg ?></div>
<?php endif; ?>
<form action="" method="POST" class="needs-validation" novalidate>
    <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <button class="btn btn-primary">Send Reset Link</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf']))
        die('CSRF error');
    $user = user_by('email', $_POST['email']);
    if ($user) {
        $token = bin2hex(random_bytes(32));
        $exp = date('Y-m-d H:i:s', strtotime('+1 hour'));
        db()->prepare("UPDATE users SET password_reset_token = ?, password_reset_expires = ? WHERE id = ?")
            ->execute([$token, $exp, $user['id']]);

        $link = BASE_URL . "auth/forgot_password.php?token=$token";
        mail($_POST['email'], 'Password Reset', "Link: $link", "Content-Type: text/html");
    }
    echo 'If the email exists, a reset link has been sent.';
} elseif (!empty($_GET['token'])) {
    $user = user_by('password_reset_token', $_GET['token']);
    if (!$user || strtotime($user['password_reset_expires']) < time())
        die('Invalid or expired token');
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_password'])) {
        $hash = hashPassword($_POST['new_password']);
        db()->prepare("UPDATE users SET password_hash = ?, password_reset_token = NULL, password_reset_expires = NULL WHERE id = ?")
            ->execute([$hash, $user['id']]);
        redirect('auth/login.php');
    }
    ?>
    <form method="POST" class="needs-validation mt-3" novalidate>
        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" minlength="6" required>
        </div>
        <button class="btn btn-success">Update Password</button>
    </form>
<?php } ?>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>