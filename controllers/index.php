<?php

// Assuming you have access to $app instance

session_start();

$loginError = isset($_SESSION['loginError']) ? $_SESSION['loginError'] : null;
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;

unset($_SESSION['loginError']);
unset($_SESSION['error']);

$users = $app['database']->selectAll('users');
$images = $app['database']->selectAll('images');

require 'views/index.view.php';


