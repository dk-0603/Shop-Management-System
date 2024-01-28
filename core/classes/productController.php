<?php


class ProductController
{
    private $pdo;

    public function __construct( $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addProduct($productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded)
    {
        $product = new Product($productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded);
        $this->pdo->addProduct($product);
    }

    public function updateProduct($productId, $productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded)
    {
        $product = new Product($productName, $brand, $category, $size, $color, $price, $quantityInStock, $supplier, $dateAdded);
        $product->setId($productId);
        $this->pdo->updateProduct($product);
    }

    public function deleteProduct($productId)
    {
        $product = new Product("", "", "", "", "", 0, 0, "", "");
        $product->setId($productId);
        $this->pdo->deleteProduct($product);
    }

    public function getProductById($productId)
    {
        return $this->pdo->getProductById($productId);
    }

    public function getAllProducts()
    {
        return $this->pdo->getAllProducts();
    }
}