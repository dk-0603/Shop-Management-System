<?php

class UsersDB
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function getAllUsers()
    {
        $query = "SELECT u.*
                  FROM Users u";

        $result = $this->pdo->query($query);
        $users = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];

            // Check if the user is already in the array
            if (!isset($users[$id])) {
                // Create a new user object for the user
                $user = new User(
                    $row['id'],
                    $row['email'],
                    $row['password'],
                    $row['firstname'],
                    $row['lastname'],
                    $row['isAdmin']
                );

                // Add the user to the array
                $users[$id] = $user;
            }
        }

        return array_values($users);  // Convert associative array to indexed array
    }



    public function getuserId($email)
    {
        try {

            // Fetch user details
            $queryuser = "SELECT * FROM users WHERE email = :email";
            $stmtuser = $this->pdo->prepare($queryuser);
            $stmtuser->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtuser->execute();

            $userRow = $stmtuser->fetch(PDO::FETCH_ASSOC);

            if (!$userRow) {
                return null; // user not found
            }

            // Create and return a user object
            return    $userRow['id'];
                   
        } catch (Exception $e) {
            // Handle the exception, log it, or rethrow as needed
            throw $e;
        }
    }

    public function getuserById($userid)
    {
        try {
            // Fetch associated image paths for the user using Images class


            // Fetch user details
            $queryuser = "SELECT * FROM users WHERE userid = :userid";
            $stmtuser = $this->pdo->prepare($queryuser);
            $stmtuser->bindParam(':userid', $userid, PDO::PARAM_INT);
            $stmtuser->execute();

            $userRow = $stmtuser->fetch(PDO::FETCH_ASSOC);

            if (!$userRow) {
                return null; // user not found
            }

            // Create and return a user object
            return    $userRow['email'];
              

           
        } catch (Exception $e) {
            // Handle the exception, log it, or rethrow as needed
            throw $e;
        }
    }




    public function login($email, $password)
    {

        try {
            $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");

            $statement->execute(array('email' => $email));

            foreach ($statement as $row) {
                //succesful login
                if (password_verify($password, $row['password'])) {

                    $_SESSION['email'] = $row['email'];
                    $_SESSION['isAdmin'] = $row['isAdmin'];

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



    public function nameTaken($username)
    {

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



    public function isAdmin($username)
    {

        $statement = $this->pdo->prepare('SELECT count(*) FROM users WHERE isAdmin=1 and email = :name');

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



    public function deleteuser($userId)
    {

        try {
            $this->pdo->beginTransaction();

            // Delete user from the users table
            $stmtuser = $this->pdo->prepare("DELETE FROM users WHERE id = :user_id");
            $stmtuser->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $userDeleted = $stmtuser->execute();


            $this->pdo->commit();

            return $userDeleted ;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function adduser(user $user)
    {
        // Start a transaction to ensure data consistency
        $this->pdo->beginTransaction();

        try {
            // Insert user information into the users table
            $queryuser = "INSERT INTO users (email, password, firstname, lastname, isAdmin) 
                             VALUES (?, ?, ?, ?, ?)";
            $paramsuser = [           
                $user->getEmail(),
                $user->getPassword(),
                $user->getFirstname(),
                $user->getLastname(),
                $user->isAdmin()
            ];

            $stmtuser = $this->pdo->prepare($queryuser);
            $stmtuser->execute($paramsuser);


            // Commit the transaction if everything is successful
            $this->pdo->commit();

            return true;
        } catch (Exception $e) {
            // Rollback the transaction if an error occurs
            $this->pdo->rollBack();
            // Log or handle the error appropriately
            return false;
        }
    }

    
    function makeAdmin($userId) {
        $this->pdo->beginTransaction();
    
        try {
            $stmt = $this->pdo->prepare("UPDATE users SET isAdmin = ABS(isAdmin-1) WHERE id = :id");
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $this->pdo->commit();
                return true; // Admin status updated successfully
            } else {
                $this->pdo->rollBack();
                return false; // No rows were affected (user not found or already admin)
            }
        } catch (PDOException $e) {
            // Handle any database errors
            $this->pdo->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    


}

