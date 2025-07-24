<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/cart_functions.php';

$cart = cart();
if (!$cart) {
    redirect('products/cart.php');
}
$totals = cartTotal();
?>
<h2>Checkout</h2>
<div class="row">
    <div class="col-md-8">
        <h5>Order Summary</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td>₱<?= number_format($item['price'] * $item['qty'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h5>Total: ₱<?= number_format($totals['total'], 2) ?> (<?= $totals['pv'] ?> PV)</h5>
    </div>
    <div class="col-md-4">
        <h5>Payment Options</h5>
        <a href="checkout.php?pay=stripe" class="btn btn-primary w-100 mb-2">Pay with Stripe</a>
        <a href="checkout.php?pay=gcash" class="btn btn-success w-100">Pay with GCash</a>
    </div>
</div>
<?php
// minimal stub for payment gateways (Phase 1D will replace)
if (isset($_GET['pay'])) {
    echo "<div class='alert alert-info mt-3'>Payment integration coming in Phase 1D.</div>";
}
require_once __DIR__ . '/../includes/footer.php'; ?>