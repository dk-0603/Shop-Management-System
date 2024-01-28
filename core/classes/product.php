<?php

// Model Class
class Product
{
    private $product_id;
    private $product_name;
    private $brand;
    private $category;
    private $size;
    private $color;
    private $price;
    private $quantity_in_stock;
    private $supplier;
    private $date_added;
    private  $images;

    // Constructor to set initial values
    public function __construct($product_name, $brand, $category, $size, $color, $price, $quantity_in_stock, $supplier, $date_added,  Images $images)
    {
        $this->product_name = $product_name;
        $this->brand = $brand;
        $this->category = $category;
        $this->size = $size;
        $this->color = $color;
        $this->price = $price;
        $this->quantity_in_stock = $quantity_in_stock;
        $this->supplier = $supplier;
        $this->date_added = $date_added;
        $this->images = $images;
    }

    // Getters for retrieving values
    public function getId()
    {
        return $this->product_id;
    }

    public function getName()
    {
        return $this->product_name;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantityInStock()
    {
        return $this->quantity_in_stock;
    }

    public function getSupplier()
    {
        return $this->supplier;
    }

    public function getDateAdded()
    {
        return $this->date_added;
    }
    public function getImages()
    {
        return $this->images->getImagePaths();
    }

    
}