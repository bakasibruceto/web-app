<?php

class SignupController extends Signup
{
    private $username;
    private $email;
    private $password;
    private $repassword;

    public function __construct($username, $email, $password, $repassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->repassword = $repassword;
    }

    public function signupUser() {
        $error = null;

        // check for errors
        if (!$this->emptyInput()) {
            $error = "emptyinput";
        } elseif (!$this->invalidUsername()) {
            $error = "username";
        } elseif (!$this->invalidEmail()) {
            $error = "email";
        } elseif (!$this->passwordMatch()) {
            $error = "password";
        } elseif (!$this->checkUserExist()) {
            $error = "userExist";
        }
    
        if ($error !== null) {
            header("location: ../view/Signup.php?error=$error");
            exit();
        }
    
        $this->setUser($this->username, $this->email, $this->password);
        header("location: ../view/Login.php");
        exit();
    

    }

    //Error Handlers
    private function emptyInput(){
        return !empty($this->username) && !empty($this->email) && !empty($this->password) && !empty($this->repassword);
    }
    
    private function invalidUsername(){
        return preg_match("/^[a-zA-Z0-9]*$/", $this->username);
    }
    
    private function invalidEmail(){
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function passwordMatch(){
        return $this->password === $this->repassword;
    }

    private function checkUserExist(){
        return $this->checkUser($this->username, $this->password);
    }   
}
