<?php

session_start();

$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

if(!$app['database']->nameTaken($_POST['email'])){

    $app['database']->insert('users', [

        'email' => $_POST['email'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
    
        'password' => $hash
    
    ]);

    header("location:/");
} else {
    $_SESSION['error'] = 'Email is already in use';

    header("location:/register");
}

