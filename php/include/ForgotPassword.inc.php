<?php
require '../../vendor/autoload.php';

if(isset($_POST['submit'])){
    // Grab data
    $email = $_POST["email"];

    require_once "../class/Database.class.php";
    require_once "../class/ForgotPassword.class.php";
    require_once "../class/ForgotPasswordController.class.php";
    
    $sendEmail = new ForgotPasswordController($email);
    $sendEmail->sendOTP();
    // Back to the previous page
    header("location: ../view/login.php");
}
