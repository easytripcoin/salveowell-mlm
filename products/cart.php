<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/cart_functions.php';

// handle POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $pkgId = intval($_POST['package_id'] ?? 0);
    if ($action === 'add') {
        addToCart($pkgId, intval($_POST['qty'] ?? 1));
    }
    if ($action === 'remove') {
        removeFromCart($pkgId);
    }
    redirect('products/cart.php');
}

$cart = cart();
$totals = cartTotal();
?>
<h2>Shopping Cart</h2>
<?php if (!$cart): ?>
    <p>Your cart is empty.</p>
    <a href="catalog.php" class="btn btn-primary">Continue Shopping</a>
<?php else: ?>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>PV</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td>₱<?= number_format($item['price'], 2) ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td>₱<?= number_format($item['price'] * $item['qty'], 2) ?></td>
                        <td><?= $item['pv'] * $item['qty'] ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="remove">
                                <input type="hidden" name="package_id" value="<?= $item['id'] ?>">
                                <button class="btn btn-sm btn-outline-danger">×</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>₱<?= number_format($totals['total'], 2) ?></th>
                    <th><?= $totals['pv'] ?> PV</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <a href="catalog.php" class="btn btn-outline-primary">Keep Shopping</a>
    <a href="checkout.php" class="btn btn-success float-end">Proceed to Checkout</a>
<?php endif; ?>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>