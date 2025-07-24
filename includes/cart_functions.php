<?php
function cart(): array
{
    return $_SESSION['cart'] ?? [];
}

function addToCart(int $packageId, int $qty = 1): void
{
    $stmt = db()->prepare("SELECT * FROM packages WHERE id = ?");
    $stmt->execute([$packageId]);
    $pkg = $stmt->fetch();
    if (!$pkg)
        return;

    if (isset($_SESSION['cart'][$packageId])) {
        $_SESSION['cart'][$packageId]['qty'] += $qty;
    } else {
        $_SESSION['cart'][$packageId] = [
            'id' => $pkg['id'],
            'name' => $pkg['name'],
            'price' => $pkg['price'],
            'pv' => $pkg['pv'],
            'qty' => $qty
        ];
    }
}

function removeFromCart(int $packageId): void
{
    unset($_SESSION['cart'][$packageId]);
}

function clearCart(): void
{
    unset($_SESSION['cart']);
}

function cartTotal(): array
{
    $total = 0;
    $pv = 0;
    foreach (cart() as $item) {
        $total += $item['price'] * $item['qty'];
        $pv += $item['pv'] * $item['qty'];
    }
    return ['total' => $total, 'pv' => $pv];
}