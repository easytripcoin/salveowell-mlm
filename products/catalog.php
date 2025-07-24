<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/product_functions.php';
$products = getProducts();
?>
<h2>Product Catalog</h2>
<div class="row">
    <?php foreach ($products as $p): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?= BASE_URL . $p['image_url'] ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $p['name'] ?></h5>
                    <a href="product_detail.php?slug=<?= $p['slug'] ?>" class="btn btn-primary">View Packages</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>