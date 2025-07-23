<?php
require_once __DIR__ . '/../config/database.php';

function db(): PDO
{
    global $pdo;
    return $pdo;
}

function user_by($column, $value)
{
    $stmt = db()->prepare("SELECT * FROM users WHERE $column = ? LIMIT 1");
    $stmt->execute([$value]);
    return $stmt->fetch();
}