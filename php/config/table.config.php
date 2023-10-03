<?php
$sqlUserTable = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sqlLogsTable = "CREATE TABLE IF NOT EXISTS log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_action VARCHAR(225),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sqlAdminTable = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sqlSuperAdminTable = "CREATE TABLE IF NOT EXISTS superAdmin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sql = [$sqlUserTable, $sqlAdminTable, $sqlLogsTable, $sqlSuperAdminTable];

$database = new Tables();

$database->createTable($sql);
