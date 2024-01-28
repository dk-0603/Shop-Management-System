<?php

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo) {

        $this->pdo = $pdo;

    }

    public function selectAll($table) {

        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
  
        $statement->execute();
      
        return $statement->fetchAll(PDO::FETCH_OBJ);

    }


    public function insert($table, $parameters){

        $sql = sprintf(
          
            'insert into %s (%s) values (%s)',
           
            $table,            implode(', ', array_keys($parameters)), ':' . implode(', :', array_keys($parameters))
        
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
       
        }   catch (Exception $e) {

            die('something went wrong');

        }

    }

    public function login($email, $password){

        try {
            $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");

            $statement->execute(array('email' => $email));

            foreach ($statement as $row){
                //succesful login
                if (password_verify($password,$row['password'])){

                    $_SESSION['email'] = $row['email'];
                
                    header("location:/");
                    
                    return true;
            
                } else {

                    $_SESSION['loginError'] = 'username or password is incorrect';
    
                    header("location:/loginForm");

                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function nameTaken($username){

        $statement = $this->pdo->prepare('SELECT count(*) FROM users WHERE email = :name');

        $statement->execute(array('name' => $username));

        $res = $statement->fetch(PDO::FETCH_NUM);

        $exists = array_pop($res);

        if ($exists > 0) {
            
            return true;
        
        } else {
            //name can be made
            return false;
        }
    }

    public function insertImagePath($imagePath)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO images (url) VALUES (?)");
            $stmt->execute([$imagePath]);

            return true;
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error)
            return false;
        }
    }

    public function addProduct2(Product $product, $imagePath)
{
    try {
        $this->pdo->beginTransaction();

        // Insert image path
        $stmt = $this->pdo->prepare("INSERT INTO images (url) VALUES (?)");
        $stmt->execute([$imagePath]);
        $imageId = $this->pdo->lastInsertId();
        $stmt->closeCursor();

        // Insert product details
        $stmt = $this->pdo->prepare("INSERT INTO products (product_name, brand, category, size, color, price, quantity_in_stock, supplier, date_added, image_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$product->getName(), $product->getBrand(), $product->getCategory(), $product->getSize(), $product->getColor(), $product->getPrice(), $product->getQuantityInStock(), $product->getSupplier(), $product->getDateAdded(), $imageId]);
        $stmt->closeCursor();

        $this->pdo->commit();
        return true;
    } catch (PDOException $e) {
        $this->pdo->rollBack();
        // Handle the exception (e.g., log the error)
        return false;
    }
}



    public function addProduct(Product $product)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Products (product_name, brand, category, size, color, price, quantity_in_stock, supplier, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$product->getName(), $product->getBrand(), $product->getCategory(), $product->getSize(), $product->getColor(), $product->getPrice(), $product->getQuantityInStock(), $product->getSupplier(), $product->getDateAdded()]);
        $stmt->closeCursor(); // Close the cursor to enable the next query
    }
    
    public function updateProduct(Product $product)
    {
        $stmt = $this->pdo->prepare("UPDATE Products SET product_name=?, brand=?, category=?, size=?, color=?, price=?, quantity_in_stock=?, supplier=?, date_added=? WHERE product_id=?");
        $stmt->execute([$product->getName(), $product->getBrand(), $product->getCategory(), $product->getSize(), $product->getColor(), $product->getPrice(), $product->getQuantityInStock(), $product->getSupplier(), $product->getDateAdded(), $product->getId()]);
        $stmt->closeCursor(); // Close the cursor to enable the next query
    }
    
    public function deleteProduct(Product $product)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Products WHERE product_id=?");
        $stmt->execute([$product->getId()]);
        $stmt->closeCursor(); // Close the cursor to enable the next query
    }
    
    public function getProductById($productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Products WHERE product_id=?");
        $stmt->execute([$productId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor(); // Close the cursor to enable the next query
    
        if ($result) {
            return new Product($result['product_name'], $result['brand'], $result['category'], $result['size'], $result['color'], $result['price'], $result['quantity_in_stock'], $result['supplier'], $result['date_added']);
        } else {
            return null;
        }
    }
    
    public function getAllProducts()
    {
        $result = $this->pdo->query("SELECT * FROM Products");
        $products = [];
    
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new Product($row['product_name'], $row['brand'], $row['category'], $row['size'], $row['color'], $row['price'], $row['quantity_in_stock'], $row['supplier'], $row['date_added']);
        }
    
        return $products;
    }
    



    
}