<?php
class Database 
{
    private $host;
    private $dbname;
    private $user;
    private $pass;

    //_contruct run a method automatically
    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
    }


    //connect to database
    protected function connect()
    {
        $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        // try{
        //     $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     return $pdo;
        // }
        // catch (PDOException $e){
        //     // echo "Error: ". $e->getMessage();
        //     die();
        // }

    }
}
