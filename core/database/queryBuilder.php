<?php

class QueryBuilder
{

    protected $pdo;

    public function __construct($pdo)
    {

        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {

        $statement = $this->pdo->prepare("SELECT * FROM {$table}");

        $statement->execute();

        $users = [];

        $users = $statement->fetchAll(PDO::FETCH_OBJ);

        return  array_values($users);
    }



    public function products()
    {
        return new ProductDB($this->pdo);
    }


    public function users()
    {
        return new UsersDB($this->pdo);
    }


    public function clients()
    {
        return new ClientsDB($this->pdo);
    }






}
