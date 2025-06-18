<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Products List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Products</h1>
    <a href="<?= base_url('products/new') ?>" class="btn-primary">Create New Product</a>
</div>

<div class="card overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No products found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($products as $index => $product): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $index + 1 ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?= esc($product['name']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">$<?= number_format($product['price'], 2) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?= $product['stock'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="<?= base_url('products/' . $product['id']) ?>" class="btn-primary text-xs">Show</a>
                                <a href="<?= base_url('products/' . $product['id'] . '/edit') ?>" class="btn-warning text-xs">Edit</a>
                                <form action="<?= base_url('products/' . $product['id']) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn-danger text-xs">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>