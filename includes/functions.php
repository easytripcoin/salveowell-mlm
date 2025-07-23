<?php
function redirect($url)
{
    header("Location: " . BASE_URL . $url);
    exit;
}

function flash($key, $message = null)
{
    if ($message) {
        $_SESSION['flash'][$key] = $message;
    } elseif (isset($_SESSION['flash'][$key])) {
        $msg = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $msg;
    }
}