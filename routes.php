<?php

$router->get('', 'controllers/index.php');

$router->get('gallery', 'controllers/gallery.php');

$router->get('loginForm', 'controllers/loginForm.php');

$router->get('register', 'controllers/register.php');

$router->post('users', 'controllers/add-user.php');

$router->post('login', 'controllers/login.php');

$router->get('logout', 'controllers/logout.php');

$router->get('products', 'controllers/products.php');

$router->post('insertproduct', 'controllers/productInsert.php');





