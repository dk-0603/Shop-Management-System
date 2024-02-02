<?php

// controllers/clients/clientDelete.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Assuming the client ID is submitted via the form
    $clientId = $_POST["clientId"];

    // Call the deleteclient method in the clientController
    $result = $app['client']->deleteclient($clientId);


        header("Location: clients");
        exit();

}
