<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!$app['user']->nameTaken($_POST['email'])) {

        $user =new User(null, $_POST['email'], $hash, $_POST['firstname'], $_POST['lastname'] ,false);

        $app['user']->addUser($user);


        header("location:/");
    } else {
        $_SESSION['error'] = 'Email is already in use';

        header("location:/register");
    }
}
