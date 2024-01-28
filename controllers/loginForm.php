<?php

session_start();

$loginError = $_SESSION['loginError'];

unset($_SESSION['loginError']);

require 'views/loginForm.view.php';