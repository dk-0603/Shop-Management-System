<?php


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {




 $userid = $app['user']->getuserId($_SESSION['email']);



    $productName = $_POST["productName"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];
    $size = $_POST["size"];
    $color = $_POST["color"];
    $price = $_POST["price"];
    $quantityInStock = $_POST["quantityInStock"];
    $supplier = $_POST["supplier"];
    $dateAdded = $_POST["dateAdded"];

    // Create a Product object with the form data
    $productImages = new Images();  

    $product = new Product(null,$productName, $brand, $category, $userid, $size, $color, $price, $quantityInStock, $supplier, $dateAdded, $productImages);

    $uploadDirectory = 'Assets/images/gallery/';
    $uploader = new ImageUploader($uploadDirectory);

    // Process the image upload.
    $uploader->processMultipleUpload();

    if (isset($_SESSION['uploaded_image_paths'])) {
        // Set the uploaded image paths to the Product object
        foreach ($_SESSION['uploaded_image_paths'] as $uploadedImagePath) {
            $productImages->addImagePath($uploadedImagePath);
        }

        // Clear the session variable
        unset($_SESSION['uploaded_image_paths']);

        // Image(s) uploaded successfully, continue with adding the product
        $app['product']->addProductWithImages($product);
    } elseif (isset($_SESSION['image_upload_error'])) {
        $error_message = $_SESSION['image_upload_error'];
        unset($_SESSION['image_upload_error']); // Clear the session variable
        // Handle the error message as needed (e.g., display it on the products page)
    }

    // Redirect to a success page or perform any other actions after adding the product

    header("Location: products");
    exit();
}

