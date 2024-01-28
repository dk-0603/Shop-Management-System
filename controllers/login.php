<?php

session_start();

//name does not exist
if(!$app['database']->nameTaken($_POST['email'])){

    $_SESSION['loginError'] = 'username or password is incorrect';

    header("location:/loginForm");

    return false;

//name exists
} else {

    $app['database']->login($_POST['email'],$_POST['password']);

}

