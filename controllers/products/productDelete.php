<?php

// controllers/products/productDelete.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Assuming the product ID is submitted via the form
    $productId = $_POST["productId"];

    // Call the deleteProduct method in the ProductController
    $result = $app['product']->deleteProduct($productId);


        header("Location: products");
        exit();

}
