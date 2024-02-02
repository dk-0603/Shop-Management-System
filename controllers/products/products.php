<?php
session_start();



$products = $app['product']->getAllProducts();


 

if (isset($error_message)) {
    echo $error_message;
}
else{
require 'views/products.view.php';
}