<?php


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {




 $userid = $app['user']->getuserId($_SESSION['email']);



    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $address = $_POST["address"];


    $client = new client(null, $firstName, $lastName, $email, $phoneNumber , $address , $userid);

        // Image(s) uploaded successfully, continue with adding the client
        $app['client']->addClient($client);
 
    header("Location: clients");
    exit();
}

