<?php

// controllers/users/userDelete.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Assuming the user ID is submitted via the form
    $userId = $_POST["userId"];

    // Call the deleteuser method in the userController
    $result = $app['user']->deleteuser($userId);


        header("Location: users");
        exit();

}
