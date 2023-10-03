<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();

require "php/class/DBHandle.class.php";
require_once "php/class/createTable.class.php";
require_once "php/config/table.config.php";
