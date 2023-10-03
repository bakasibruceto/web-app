<?php
class DBHandle //Abstrac reference to a resource (MySQL)
{
    private $host;
    private $dbname;
    private $user;
    private $password;

    //_contruct run a method automatically
    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
    }

    //connect to database
    protected function connect()
    {
        $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

