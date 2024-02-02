<?php

// Assuming you have access to $app instance

session_start();

// $isAdmin = false;

// // Check if the user is an admin in the database
// if ($app['database']->isAdmin($_SESSION['email'])) {
//     $isAdmin = true;
    
//     // Store $isAdmin in the session
//     $_SESSION['isAdmin'] = $isAdmin;
// }


// name does not exist
if (!$app['user']->nameTaken($_POST['email'])) {
    $_SESSION['loginError'] = 'username or password is incorrect';
    header("location:/loginForm");
    return false;
} else {
    $app['user']->login($_POST['email'], $_POST['password']);
}
