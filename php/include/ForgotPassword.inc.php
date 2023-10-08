<?php
require '../../vendor/autoload.php';
if(isset($_POST['submit'])){
    
    // Grab data
    $username = $_POST["username"];
    $email = $_POST["email"];

    require_once "../class/Database.class.php";
    require_once "../class/Login.class.php";
    require_once "../class/LoginController.class.php";
    $sendOTP = new LoginController($username,$email);
    
    $sentOPT->sendEmail();

    // Back to previous page
    header("location: ../view/login.php");


}

?>