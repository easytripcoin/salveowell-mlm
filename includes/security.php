<?php
function hashPassword($plain)
{
    return password_hash($plain, PASSWORD_BCRYPT);
}

function verifyPassword($plain, $hash)
{
    return password_verify($plain, $hash);
}

function csrf_token()
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function verify_csrf($token)
{
    return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}