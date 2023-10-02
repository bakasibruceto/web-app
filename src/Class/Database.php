<?php
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

class Database
{
    private $conn;
    //__construct runs automatically
    public function __construct($host, $dbname, $user, $password)
    {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection Successful <br><br>";
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage()  ."<br><br>";
            
        }
    }

    //create table from database
    public function createTable($tableName, $sql)
    {
        try {
            $this->conn->exec($sql);
            echo "$tableName Table Created Successfully <br>";
        } catch (PDOException $e) {
            echo "Error creating $tableName table: " . $e->getMessage() ."<br>";
        }
    }
}


