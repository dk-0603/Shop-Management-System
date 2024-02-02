<?php
session_start();

// $productController = new ProductController($app['product']);

// $products = $productController->getAllProducts();


// Example query to retrieve users from the database
$users = $app['user']->getAllusers();


if (isset($error_message)) {
    echo $error_message;
}
else{
require 'views/users.view.php';
}