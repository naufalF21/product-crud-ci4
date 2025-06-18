<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Product Details
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Product Details</h1>
    <a href="<?= base_url('products') ?>" class="btn-primary">Back to Products</a>
</div>

<div class="card">
    <div class="mb-4">
        <strong class="block text-gray-700 text-sm font-bold mb-1">Name:</strong>
        <p class="text-gray-800"><?= esc($product['name']) ?></p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700 text-sm font-bold mb-1">Description:</strong>
        <p class="text-gray-800"><?= esc($product['description'] ?? 'N/A') ?></p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700 text-sm font-bold mb-1">Price:</strong>
        <p class="text-gray-800">$<?= number_format($product['price'], 2) ?></p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700 text-sm font-bold mb-1">Stock:</strong>
        <p class="text-gray-800"><?= $product['stock'] ?></p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700 text-sm font-bold mb-1">Created At:</strong>
        <p class="text-gray-800"><?= $product['created_at'] ?></p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700 text-sm font-bold mb-1">Last Updated:</strong>
        <p class="text-gray-800"><?= $product['updated_at'] ?></p>
    </div>
    <div class="flex space-x-2 mt-6">
        <a href="<?= base_url('products/' . $product['id'] . '/edit') ?>" class="btn-warning">Edit Product</a>
        <form action="<?= base_url('products/' . $product['id']) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn-danger">Delete Product</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>