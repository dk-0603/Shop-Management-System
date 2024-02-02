<?php

class ClientsDB
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function getAllClients()
    {
        $query = "SELECT c.*, u.email as CreatorEmail FROM Clients c
                    left join users u on u.id=c.creator_id
        ";

        $result = $this->pdo->query($query);
        $Clients = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['Clientid'];

            // Check if the Client is already in the array
            if (!isset($Clients[$id])) {
                // Create a new Client object for the Client
                $Client = new Client(
                    $row['Clientid'],
                    $row['first_name'],
                    $row['last_name'],
                    $row['email'],
                    $row['phone_number'],
                    $row['address'],
                    $row['CreatorEmail']
                );

                // Add the Client to the array
                $Clients[$id] = $Client;
            }
        }

        return array_values($Clients);  // Convert associative array to indexed array
    }



    public function deleteClient($ClientId)
    {

        try {
            $this->pdo->beginTransaction();

            // Delete Client from the Clients table
            $stmtClient = $this->pdo->prepare("DELETE FROM Clients WHERE Clientid = :Client_id");
            $stmtClient->bindParam(':Client_id', $ClientId, PDO::PARAM_INT);
            $ClientDeleted = $stmtClient->execute();
            $this->pdo->commit();
            return $ClientDeleted;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function addClient(Client $Client)
    {
        // Start a transaction to ensure data consistency
        $this->pdo->beginTransaction();

        try {
            // Insert Client information into the Clients table
            $queryClient = "INSERT INTO Clients (first_name, last_name, email, phone_number, address, creator_id) 
                             VALUES (?, ?, ?, ?, ?, ?)";
            $paramsClient = [
                $Client->getFirstName(),
                $Client->getLastName(),
                $Client->getEmail(),
                $Client->getPhoneNumber(),
                $Client->getAddress(),
                $Client->getUser()
            ];

            $stmtClient = $this->pdo->prepare($queryClient);
            $stmtClient->execute($paramsClient);


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
}
