<?php

Dotenv\Dotenv::createImmutable(__DIR__ . '../../..')->load();

class Database 
{
    private $host;
    private $dbname;
    private $user;
    private $pass;
    

    protected function connect()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];

        try {
            $pdo = new PDO('mysql:host=' . $this->host, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$this->dbname`");

            $pdo = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
}
