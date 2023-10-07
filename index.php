<?php
require __DIR__ . "/vendor/autoload.php";
Dotenv\Dotenv::createImmutable(__DIR__)->load();


require "php/class/Database.class.php";
require_once "php/class/Query.class.php";
require_once "php/config/table.config.php";

header ("location: php/view/landing.php");