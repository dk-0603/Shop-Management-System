<?php




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productController = new ProductController($app['database']);

    $productName = $_POST["productName"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];
    $size = $_POST["size"];
    $color = $_POST["color"];
    $price = $_POST["price"];
    $quantityInStock = $_POST["quantityInStock"];
    $supplier = $_POST["supplier"];
    $dateAdded = $_POST["dateAdded"];


    $uploadDirectory = 'Assets/images/gallery/';
    $uploader = new ImageUploader($uploadDirectory,$app['database']);
    
    // Process the image upload.
    $uploader->processUpload();

    if (isset($_SESSION['image_upload_success'])) {
        unset($_SESSION['image_upload_success']); // Clear the session variable
        // Image uploaded successfully, continue with adding the product
        $productController->addProduct($productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded);
    } elseif (isset($_SESSION['image_upload_error'])) {
        $error_message = $_SESSION['image_upload_error'];
        unset($_SESSION['image_upload_error']); // Clear the session variable
        // Handle the error message as needed (e.g., display it on the products page)
    }
    

    // Redirect to a success page or perform any other actions after adding the product
    header("Location: products");
    exit();
}



