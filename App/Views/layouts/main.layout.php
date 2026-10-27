<?php

/** @var string $content */ ?>
<!doctype html>
<html lang="ca">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Exemple router', ENT_QUOTES, 'UTF-8') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <header>
            <h2>Exemples de router PHP</h2>
            <nav class="d-flex gap-3 mb-3">
            <a href="/">Inici</a>
            <a href="/products">Productes</a>
            <a href="/login">Login</a></nav>
        </header>
        <hr>
        <main><?= $content ?></main>
        <hr>
        <footer class="text-center">PHP · Router, autoload i render</footer>
    </div>
</body>

</html>