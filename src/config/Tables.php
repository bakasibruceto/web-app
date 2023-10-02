<?php
$database = new Database($host, $dbname, $user, $password);

$sqlUserTable = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$database->createTable("user", $sqlUserTable);

$sqlLogsTable = "CREATE TABLE IF NOT EXISTS log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_action VARCHAR(225),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$database->createTable("log", $sqlLogsTable);