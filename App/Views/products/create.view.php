<?php 
/**
 * @var string $title
 * @var string $error
 */
?>
<h3><?= htmlspecialchars($title) ?></h3>
<?php if (isset($error)): ?>

    <div class="alert alert-danger">
        <?= htmlspecialchars($error) ?>
    </div>

<?php endif; ?>
<!-- El formulari envia a la ruta /products amb metode POST  
Cal consultar index.php on va a parar aquesta ruta -->
<form action="/products" method="post">
    <label class="form-label mb-2" for="name">Name: </label>
    <input class="form-control mb-2" type="text" name="name">
    <label class="form-label mb-2" for="price">Price: </label>
    <input class="form-control mb-2" type="text" name="price">
    <label class="form-label mb-2" for="category">Category: </label>
    <input class="form-control mb-2" type="text" name="category">

    <input class="btn btn-primary mb-2" type="submit" value="enviar">
</form>

