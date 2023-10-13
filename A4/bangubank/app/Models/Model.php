<?php
namespace App\Models;

use PDO;
use PDOException;
class Model{
    private PDO $pdoConnection;
    public function __construct()
    {
        $this->setupDatabaseConnection();
    }

    public function setupDatabaseConnection(){
        $config = require_once __DIR__."/../../config/database.php";
        try {
            $this->pdoConnection = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['password']);
            $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //echo "Connected successfully<br>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->pdoConnection;
    }
//    CRUD
    public function getAll($tablename)
    {
        $query = "SELECT * FROM {$tablename}";
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($primaryKey, $primaryKeyValue,$tablename)
    {
        $query = "SELECT * FROM {$tablename} WHERE {$primaryKey}= :primaryKeyValue";
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->bindParam(':primaryKeyValue', $primaryKeyValue);
        $stmt->execute();
        $stmt->fetchAll();
    }
    public function delete($primaryKey, $primaryKeyValue, $tablename)
    {
        $query = "DELETE FROM {$tablename} WHERE {$primaryKey}= :primaryKeyValue";
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->bindParam(':primaryKeyValue', $primaryKeyValue);
        $stmt->execute();
    }
    public function update($primaryKey, $primaryKeyValue, $data, $tablename)
    {
        $setClause = "";
        foreach ($data as $key=>$value) {
            $setClause = $setClause. "$key= :$key, ";
        }
        $setClause = rtrim($setClause, ', ');
        $query = "UPDATE {$tablename} SET {$setClause} WHERE {$primaryKey}= :primaryKeyValue";
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->bindParam(':primaryKeyValue', $primaryKeyValue);
        foreach ($data as $key=>&$value)
        {
            $stmt->bindParam(":{$key}", $value);

        }
        $stmt->execute();
    }
    public function create(array $data,$tablename)
    {

        $keys = implode(', ',array_keys($data));
        $values = ':'. implode(', :',array_keys($data));

        $query = "INSERT INTO {$tablename} ({$keys}) VALUES ({$values})";
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->execute($data);
    }
//    CRUD
    public function select($data, $tableName){
        $query = "SELECT * FROM {$tableName} WHERE ";
        $params = [];
        foreach ($data as $column => $value){
            $query = $query."{$column} = :{$column} AND ";
            $params[":{$column}"] = $value;
        }
        $query = rtrim($query, ' AND ');
        $stmt = $this->pdoConnection->prepare($query);
        foreach($params as $paramName => $paramValue){
            $stmt->bindParam($paramName, $paramValue);
        }
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function calculateCurrentBalance($customerID){
        $query = "SELECT SUM(
    CASE 
        WHEN transactionType = 'deposit' THEN amount
        WHEN transactionType = 'withdraw' THEN -amount
        WHEN transactionType = 'transfer' THEN -amount
        ELSE 0
    END
    ) AS currentBalance FROM Transaction WHERE customerID = :customerID";
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->bindParam(':customerID',$customerID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['currentBalance'];
    }
    public function listOfBalanceTransferred($customerId){
        $query = "SELECT transaction.amount, customer.customerEmail, customer.customerName 
                    FROM Transaction as transaction INNER JOIN Customer as customer
                        ON transaction.receiverID = customer.customerID 
                            WHERE transaction.customerID = :customerId AND transaction.transactionType = 'transfer'";
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->bindParam(':customerId',$customerId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


}
