<?php

// Model Class
class User
{
    private $id;
    private $email;
    private $password;
    private $firstname	;
    private $lastname	;
    private $isAdmin ;

    // Constructor to set initial values
    public function __construct($id= null,$email, $password, $firstname, $lastname, $isAdmin=false)
    {   
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->isAdmin = $isAdmin;
 
    }


    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function isAdmin()
    {
        return $this->isAdmin;
    }

}