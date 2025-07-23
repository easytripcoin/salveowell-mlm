<?php
session_start();
require_once __DIR__ . '/../includes/genealogy_functions.php';

header('Content-Type: application/json');

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$depth = intval($_GET['depth'] ?? 3);
echo json_encode(buildTree($userId, $depth));