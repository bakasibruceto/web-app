<?php
require '../../vendor/autoload.php';

if(isset($_POST['submit'])){
    
    // Grab data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    require_once "../class/Database.class.php";
    require_once "../class/Signup.class.php";
    require_once "../class/SignupController.class.php";

    $signup = new SignupController($username, $email, $password, $repassword);
    $signup->signupUser();

    // Back to Frontpage
    header("../../view/Signup.php");


}

?>