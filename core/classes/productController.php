<?php


class ProductController
{
    private $pdo;

    public function __construct( $pdo)
    {
        $this->pdo = $pdo;
    }

    // public function addProduct($productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded)
    // {
    //     $product = new Product($productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded );
    //     $this->pdo->addProduct($product);
    // }

    private $product;
    public function addProductWithImages(Product $product)
    {
        $this->product = $product;
        $this->pdo->addProduct($product);
    }

    // public function updateProduct($productId, $productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded)
    // {
    //     $product = new Product($productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded);
    //     $product->setId($productId);
    //     $this->pdo->updateProduct($product);
    // }

    // public function deleteProduct($productId)
    // {
    //     $product = new Product("", "", "", "", "", 0, 0, "", "");
    //     $product->setId($productId);
    //     $this->pdo->deleteProduct($product);
    // }

    public function getProductById($productId)
    {
        return $this->pdo->getProductById($productId);
    }



    public function getAllProducts()
    {
        return $this->pdo->getAllProducts();
    }


    public function deleteProduct($productId)
    {
    $this->pdo->deleteProduct($productId);
 
        
        
        // try {
        //     $result = $this->pdo->deleteProduct($productId);

        //     if ($result) {
        //         // Product and associated images successfully deleted
        //         return true;
        //     } else {
        //         // Handle the case where deletion failed
        //         return false;
        //     }
        // } catch (Exception $e) {
        //     // Handle any exceptions thrown during the deletion process
        //     return false;
        // }
    }
    
}