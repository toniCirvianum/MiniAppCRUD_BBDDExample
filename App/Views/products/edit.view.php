<?php 
/**
 * @var string $title
 * @var string $error
 * @var array $product
 */
?>
<h3><?= htmlspecialchars($title) ?></h3>
<?php if (isset($error)): ?>

    <div class="alert alert-danger">
        <?= htmlspecialchars($error) ?>
    </div>

<?php endif; ?>
<form action="/products/<?= htmlspecialchars($product['id']) ?>" method="post">
    <input type="hidden" name="_method" value="PUT">
    <label class="form-label mb-2" for="name">Name: </label>
    <input class="form-control mb-2" type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>">
    <label class="form-label mb-2" for="price">Price: </label>
    <input class="form-control mb-2" type="text" name="price" value="<?= htmlspecialchars($product['price']) ?>">
    <label class="form-label mb-2" for="category">Category: </label>
    <input class="form-control mb-2" type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>">

    <input class="btn btn-primary mb-2" type="submit" value="enviar">
</form>

