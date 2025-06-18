<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Create Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Create New Product</h1>
    <a href="<?= base_url('products') ?>" class="btn-primary">Back to Products</a>
</div>

<div class="card">
    <form action="<?= base_url('products') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Product Name:</label>
            <input type="text" name="name" id="name" class="form-input" placeholder="Enter product name" value="<?= old('name') ?>" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <textarea name="description" id="description" class="form-input" rows="4" placeholder="Enter product description"><?= old('description') ?></textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <input type="number" name="price" id="price" class="form-input" step="0.01" placeholder="Enter price" value="<?= old('price') ?>" required>
        </div>
        <div class="mb-6">
            <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
            <input type="number" name="stock" id="stock" class="form-input" placeholder="Enter stock quantity" value="<?= old('stock') ?>" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="btn-success">Add Product</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>