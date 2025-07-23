<?php
require_once __DIR__ . '/../config/referral_config.php';

function captureReferral(): ?int
{
    if (isset($_GET[REFERRAL_PARAM])) {
        $ref = $_GET[REFERRAL_PARAM];
        $user = user_by('username', $ref);
        return $user['id'] ?? null;
    }
    return null;
}