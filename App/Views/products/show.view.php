<h3><?= htmlspecialchars($product["name"], ENT_QUOTES, "UTF-8") ?></h3>
<p>ID: <?= htmlspecialchars($product["id"]) ?></p>
<p>Preu: <?= number_format($product["price"], 2, ",", ".") ?> €</p>
<h4>Modificar producte</h4>


<a href="/products">Tornar</a>