<?php
//createTable function in Database class
$database = new Database($host, $dbname, $user, $password);

//User Table
$sqlUserTable = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$database->createTable("user", $sqlUserTable);

//Logs Table
$sqlLogsTable = "CREATE TABLE IF NOT EXISTS log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_action VARCHAR(225),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$database->createTable("log", $sqlLogsTable);

//Admin Table
$sqlAdminTable = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$database->createTable("admin", $sqlAdminTable);

//SuperAdmin Table
$sqlSuperAdminTable = "CREATE TABLE IF NOT EXISTS superAdmin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$database->createTable("superAdmin", $sqlSuperAdminTable);