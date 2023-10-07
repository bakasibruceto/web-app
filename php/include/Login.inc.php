<?php
require '../../vendor/autoload.php';
if(isset($_POST['submit'])){
    
    // Grab data
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "../class/Database.class.php";
    require_once "../class/Login.class.php";
    require_once "../class/LoginController.class.php";
    $login = new LoginController($username,$password);
    
    $login->loginUser();

    // Back to Frontpage
    header("location: ../view/login.php");


}

?>