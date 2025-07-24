<?php
function getProducts(): array
{
    return db()->query("SELECT * FROM products WHERE is_active = 1")->fetchAll();
}

function getProductBySlug(string $slug): ?array
{
    $stmt = db()->prepare("SELECT * FROM products WHERE slug = ? AND is_active = 1");
    $stmt->execute([$slug]);
    return $stmt->fetch() ?: null;
}

function getPackages(int $productId): array
{
    $stmt = db()->prepare("SELECT * FROM packages WHERE product_id = ? AND is_active = 1 ORDER BY price ASC");
    $stmt->execute([$productId]);
    return $stmt->fetchAll();
}