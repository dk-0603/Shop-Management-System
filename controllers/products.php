<?php
session_start();

$productController = new ProductController($app['database']);

$products = $productController->getAllProducts();

if (isset($error_message)) {
    echo $error_message;
}
else{
require 'views/products.view.php';
}