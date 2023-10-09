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
    FOREIGN KEY (account_id) REFERENCES account(id) ON DELETE CASCADE ON UPDATE CASCADE
)";

$sqlUserTable = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT, 
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    age INT,
    gender VARCHAR (255),
    picture VARCHAR(255),
    FOREIGN KEY (account_id) REFERENCES account(id) ON DELETE CASCADE ON UPDATE CASCADE
)";

$sqlAdminTable = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT, 
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    age INT,
    gender VARCHAR (255),
    picture VARCHAR(255),
    FOREIGN KEY (account_id) REFERENCES account(id)ON DELETE CASCADE ON UPDATE CASCADE
)";

$sqlSuperAdminTable = "CREATE TABLE IF NOT EXISTS superAdmin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT,
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    age INT,
    gender VARCHAR (255),
    picture VARCHAR(255),
    FOREIGN KEY (account_id) REFERENCES account(id) ON DELETE CASCADE ON UPDATE CASCADE
)";

$sqlOtpTable = "CREATE TABLE IF NOT EXISTS OTP (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT,
    otp_code VARCHAR(6),
    is_used BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expired_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (account_id) REFERENCES account(id) ON DELETE CASCADE ON UPDATE CASCADE
)";


$sql = [$sqlAccountsTable, $sqlLogsTable, $sqlOtpTable, $sqlAdminTable, $sqlSuperAdminTable, $sqlUserTable ];

$database = new Query();

$database->createQuery($sql);
