<?php

// Assuming you have access to $app instance

session_start();

$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;

unset($_SESSION['error']);

require 'views/register.view.php';
