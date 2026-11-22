<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Shop') ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <h1>My Shop</h1>
        <nav>
            <a href="index.php?page=products">Products</a>
            <a href="index.php?page=cart">Cart</a>
        </nav>
    </header>
    <main>
