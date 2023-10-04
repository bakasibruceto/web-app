<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();

require "php/class/Database.class.php";
require_once "php/class/Tables.class.php";
require_once "php/config/table.config.php";

header ("location: php/view/Signup.php");