<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/genealogy_functions.php';
$treeJson = json_encode(buildTree($_SESSION['user_id']));
?>
<h2>Your Genealogy</h2>
<div id="genealogy-tree" class="mt-4"></div>
<script>
    const treeData = <?= $treeJson ?>;
</script>
<script src="<?= BASE_URL ?>assets/js/genealogy.js"></script>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>