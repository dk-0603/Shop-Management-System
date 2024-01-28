<?php

$users = $app['database']->selectAll('users');
 


session_start();

// $loginError = $_SESSION['loginError'];

// $error = $_SESSION['error'];

unset($_SESSION['loginError']);

unset($_SESSION["error"]);

if(!isset($_SESSION['email']))  {
    require 'views/loginForm.view.php';
}  
else{
    require 'views/index.view.php';
}


 