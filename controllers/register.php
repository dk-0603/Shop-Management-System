<?php

session_start();

$error = $_SESSION['error'];

unset($_SESSION["error"]);

require 'views/register.view.php';