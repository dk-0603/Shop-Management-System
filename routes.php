<?php

$router->get('', 'controllers/index.php');

$router->get('gallery', 'controllers/gallery.php');

$router->get('loginForm', 'controllers/users/loginForm.php');

$router->get('register', 'controllers/users/register.php');

$router->post('users', 'controllers/users/add-user.php');

$router->post('login', 'controllers/users/login.php');


$router->get('logout', 'controllers/users/logout.php');

$router->get('products', 'controllers/products/products.php');

$router->post('insertproduct', 'controllers/products/productInsert.php');

$router->post('delete-product', 'controllers/products/productDelete.php');
 
$router->post('delete-user', 'controllers/users/userDelete.php');

$router->get('users', 'controllers/users/users.php');