<?php
// Front controller: every request comes through here.
// Example URLs: index.php?page=products  |  index.php?page=cart
session_start();

require_once 'config/config.php';
require_once 'core/Database.php';
require_once 'core/Controller.php';

$page = $_GET['page'] ?? 'products';

switch ($page) {
    case 'cart':
        require_once 'controllers/CartController.php';
        $controller = new CartController();
        break;
    case 'products':
    default:
        require_once 'controllers/ProductController.php';
        $controller = new ProductController();
        break;
}

$controller->index();
