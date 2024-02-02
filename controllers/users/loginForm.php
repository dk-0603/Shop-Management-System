<?php

session_start();

$loginError =  isset($_SESSION['loginError']) ? $_SESSION['loginError'] : null;

unset($_SESSION['loginError']);

require 'views/loginForm.view.php';