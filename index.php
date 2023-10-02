<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();

require_once "src/Class/Database.php";
require_once "src/config/Tables.php";
