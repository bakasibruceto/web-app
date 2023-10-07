<?php

$sqlAccountsTable = "CREATE TABLE IF NOT EXISTS account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role VARCHAR(225) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sqlLogsTable = "CREATE TABLE IF NOT EXISTS log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT, 
    user_action VARCHAR(225),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (account_id) REFERENCES account(id) 
)";

$sqlUserTable = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT, 
    FOREIGN KEY (account_id) REFERENCES account(id) 
)";

$sqlAdminTable = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT, 
    FOREIGN KEY (account_id) REFERENCES account(id)
)";

$sqlSuperAdminTable = "CREATE TABLE IF NOT EXISTS superAdmin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT,
    FOREIGN KEY (account_id) REFERENCES account(id)
)";

$sql = [$sqlAccountsTable, $sqlLogsTable, $sqlAdminTable, $sqlSuperAdminTable, $sqlUserTable ];

$database = new Query();

$database->createQuery($sql);
