<?php


Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '../../..')->load();

class Database 
{
    private $host;
    private $dbname;
    private $user;
    private $pass;

    //_contruct run a method automatically
   

    //connect to database
    protected function connect()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
        try{
            $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch (PDOException $e){
            echo "Error: ". $e->getMessage();
            die();
        }

    }
}
