<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();;

$host = $_ENV['DB_HOST'];
$db = $_ENV['DB_DATABSE'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

try{
    $conn = new PDO("mysql:host=$host; dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Successfull";
}catch (PDOException $e){
    echo "Connection Faild" . $e->getMessage();
}