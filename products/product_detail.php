<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/product_functions.php';
$slug = $_GET['slug'] ?? '';
$product = getProductBySlug($slug);
if (!$product) {
    http_response_code(404);
    echo "Product not found";
    exit;
}
$packages = getPackages($product['id']);
?>
<h2><?= $product['name'] ?></h2>
<div class="row">
    <div class="col-md-6">
        <img src="<?= BASE_URL . $product['image_url'] ?>" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <p><?= nl2br($product['description']) ?></p>
        <form action="cart.php" method="POST">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label>Select Package</label>
                <select name="package_id" class="form-select" required>
                    <?php foreach ($packages as $pkg): ?>
                        <option value="<?= $pkg['id'] ?>">
                            <?= $pkg['name'] ?> – ₱<?= number_format($pkg['price'], 2) ?> (<?= $pkg['pv'] ?> PV)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="qty" value="1" min="1" class="form-control" style="width: 100px;">
            </div>
            <button class="btn btn-success">Add to Cart</button>
        </form>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>