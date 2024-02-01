<?php


class ProductController
{
    private $pdo;

    public function __construct( $pdo)
    {
        $this->pdo = $pdo;
    }



    private $product;
    public function addProductWithImages(Product $product)
    {
        $this->product = $product;
        $this->pdo->addProduct($product);
    }


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
 
    }
    
    

    public function getProductUser($productId)
    {
    $this->pdo->getProductUser($productId);
 
    }

}