<?php
session_start();



$clients = $app['client']->getAllclients();


 

if (isset($error_message)) {
    echo $error_message;
}
else{
require 'views/clients.view.php';
}