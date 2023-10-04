<?php


if(isset($_POST['submit'])){
    
    // Grab data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $repassword = $_POST["repassword"];


    require_once "../class/Database.class.php";
    require_once "../class/Signup.class.php";
    require_once "../class/SignupController.class.php";

    $signup = new Signup($username, $email, $password);
    $signup->setUser($username, $email, $password);

    // Back to Frontpage
    header("location: ../../index.php");


}

?>