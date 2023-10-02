<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();

require_once "src/class/database.class.php";
require_once "src/config/tables.config.php";
